<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function prosesPembayaran($transaksi)
    {
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

        $query = Pembayaran::with('userTransaksi')->select("*");

        if ($globalSearch) {
            $query->where('no_transaksi', 'like', '%' . $globalSearch . '%')
                ->orWhereDate('tanggal_transaksi', $globalSearch);
        }

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
            $data['tanggal'] = "Data Kosong";
            $data['user'] = "Data Kosong";
            $data['status'] = "Data Kosong";
            $data['action'] = "#";
            $arr[] = $data;
        } else {
            foreach ($resData as $key => $value) {
                $data['rnum'] = $i;
                $data['no_tr'] = $value->no_transaksi;
                $data['tanggal'] = $value->tanggal_transaksi;
                $data['user'] = $value->userTransaksi->name;
                $data['status'] = $value->status;

                $data['action'] = '<div class="d-flex"><a href="' . route("admin.transaksi.detail", \base64_encode($value->id)) . '" class="btn btn-sm btn-success"><i class="bi bi-eye"></i></a></div>';

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
