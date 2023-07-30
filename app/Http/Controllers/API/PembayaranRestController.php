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

        return \response()->json([
            'success' => \true,
            'pembayaran' => $pembayaran
        ], 200);
    }
}
