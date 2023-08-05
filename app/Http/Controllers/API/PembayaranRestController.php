<?php

namespace App\Http\Controllers\API;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranRestController extends Controller
{
    public function getPembayaran(Request $request)
    {
        $user_id = Auth::user()->id;
        $pembayaran = Pembayaran::with('pembayaranTransaksi')->where('user_id', $user_id)->get();
        $res = [];
        foreach ($pembayaran as $key => $value) {
            $data['id'] = $value->id;
            $data['keterangan'] = $value->keterangan;
            $data['total'] = $value->total;
            $data['no_transaksi'] = $value->pembayaranTransaksi->no_transaksi;
            $res = $data;
        }


        return \response()->json(['meta' => ['success' => true, 'message' => 'berhasil'], 'data' => [$res]], 200);
    }
}
