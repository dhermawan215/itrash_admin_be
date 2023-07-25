<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return \view('admin.admin-pembayaran');
    }

    public function prosesPembayaran($transaksi)
    {
        //memproses log pembayaran saat transaksi berhasil
        $pembayaran = "Pembayaran berhasil dilakukan sebesar: Rp " . number_format($transaksi->total, 0, ",", ".");
        $result = Pembayaran::create([
            'user_id' => $transaksi->user_id,
            'transaksi_id' => $transaksi->id,
            'keterangan' => $pembayaran,
            'total' => $transaksi->total,
        ]);

        return $result;
    }

    public function getPembayaran(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 10;
        $globalSearch = $request['search']['value'];

        $query = Pembayaran::with('userPembayaran', 'pembayaranTransaksi')->select("*");

        // if ($globalSearch) {
        //     $query->where('no_transaksi', 'like', '%' . $globalSearch . '%')
        //         ->orWhereDate('tanggal_transaksi', $globalSearch);
        // }

        $recordsFiltered = $query->count();

        $resData = $query->skip($offset)
            ->take($limit)
            ->get();

        $recordsTotal = $resData->count();

        $data = [];
        $i = $offset + 1;

        if ($resData->isEmpty()) {
            $data['rnum'] = "#";
            $data['no_tr'] = "Data Kosong";
            $data['nasabah'] = "Data Kosong";
            $data['total'] = "Data Kosong";
            $data['tanggal'] = "Data Kosong";
            $data['action'] = "#";
            $arr[] = $data;
        } else {
            foreach ($resData as $key => $value) {
                $data['rnum'] = $i;
                $data['no_tr'] = $value->pembayaranTransaksi->no_transaksi;
                $data['nasabah'] = $value->userPembayaran->name;
                $data['total'] = $value->total;
                $data['tanggal'] = $value->created_at->format('d-m-Y');
                $data['keterangan'] = $value->keterangan;

                $data['action'] = '<div class="d-flex"><button type="button" class="btn btn-sm btn-success "  data-bs-toggle="modal" data-bs-target="#formShowPembayaran"><i class="bi bi-eye"></button></div>';

                $arr[] = $data;
                $i++;
            }
        }

        return \response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr,
        ]);
    }
}
