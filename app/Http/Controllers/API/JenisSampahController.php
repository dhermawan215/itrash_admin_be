<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JenisSampah;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    public function getAll(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $jenisSampahData = JenisSampah::with('kategoriSampah')->find($id);

            if (!$jenisSampahData) {
                return \response()->json([
                    'success' => \false,
                    'jenis_sampah' => \null
                ], 500);
            }

            return \response()->json([
                'success' => \true,
                'jenis_sampah' => $jenisSampahData
            ], 200);
        }

        $jenisSampahData = JenisSampah::with('kategoriSampah')->get();
        $jenisSampahDatas = \collect($jenisSampahData);

        return \response()->json([
            'success' => \true,
            'message' => 'Data berhasil diambil',
            'jenis_sampah' => $jenisSampahDatas,
        ], 200);
    }
}
