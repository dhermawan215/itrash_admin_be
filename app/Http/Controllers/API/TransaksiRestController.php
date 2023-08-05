<?php

namespace App\Http\Controllers\API;

use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiRestController extends Controller
{
    public function getTransaksi(Request $request)
    {
        $user_id = Auth::user()->id;
        $id_transaksi = $request->input('id_transaksi');

        if ($id_transaksi) {
            $transaksiDetail = TransaksiDetail::with('transaksi', 'jenisSampahTransaksi')->where('transaksi_id', $id_transaksi)->get();

            if (!$transaksiDetail) {
                return \response()->json([
                    'success' => \true,
                    'messagges' => 'data kosong',
                    'transaksi' => null
                ], 404);
            }

            return \response()->json([
                'success' => \true,
                'messagges' => 'berhasil',
                'transaksi' => $transaksiDetail
            ], 200);
        }

        $transaksi = Transaksi::where('user_id', $user_id)->get();

        return \response()->json([
            'meta' => [
                'success' => \true,
                'message' => 'berhasil',
            ],
            'data' => $transaksi
        ], 200);
    }

    public function saveTransaksi(Request $request)
    {
        $no_tr = "TR-" . date('Ymd') . "-" . Str::random(4) . date('s');
        $status = "PENDING";
        $carbon = Carbon::now();
        $user_id = Auth::user()->id;
        $jenis_sampah_id = $request->input('jenis_sampah_id');

        $qty = $request->input('qty');

        //membuat transaksi
        $transaksi = Transaksi::create([
            'no_transaksi' => $no_tr,
            'tanggal_transaksi' => $carbon->toDateString(),
            'user_id' => $user_id,
            'status' => $status
        ]);

        // buat transaksi detail
        $transaksiDetail = TransaksiDetail::create([
            'transaksi_id' => $transaksi->id,
            'jenis_sampah_id' => $jenis_sampah_id,
            'qty' => $qty,
            'subtotal' => 0
        ]);

        //response
        return \response()->json([
            'success' => \true,
            'messagges' => 'berhasil',
            'transaksi' => $transaksi,
        ]);
    }
}
