<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Models\KategoriSampah;
use Illuminate\Support\Facades\Validator;

class AdminJenisSampah extends Controller
{
    public function index()
    {
        return \view('admin.admin-jenis-sampah');
    }


    public function getAllData(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 10;
        $globalSearch = $request['search']['value'];

        $query = JenisSampah::with('kategoriSampah')->select("*");

        if ($globalSearch) {
            $query->where('nama_sampah', 'like', '%' . $globalSearch . '%');
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
            $data['nama'] = "Data Kosong";
            $data['kategori'] = "Data Kosong";
            $data['action'] = "#";
            $arr[] = $data;
        } else {
            foreach ($resData as $key => $value) {
                $data['rnum'] = $i;
                $data['index'] = \base64_encode($value->id);
                $data['nama'] = $value->nama_sampah;
                $data['kategori'] = $value->kategoriSampah->nama_kategori;

                $data['action'] = '<div class="d-flex"><a href="' . route("admin.jenis_sampah.edit", \base64_encode($value->id)) . '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                <button type="button" id="btnDelete" class="btndel btn btn-sm btn-danger ms-2" data-id="' . base64_encode($value->id) . '"><i class="bi bi-trash"></i></button></div>';

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

    public function create()
    {
        $kategori = KategoriSampah::all();
        return \view('admin.create-jenis-sampah', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $requestAll = $request->all();

        //validasi request masuk
        $validator = Validator::make(
            $request->all(),
            [
                'nama_sampah' => 'required|string|max:150',
            ]
        );

        if ($validator->fails()) {
            return \response()->json($validator->errors()->all(), 400);
        }

        //unset token csrf
        unset($requestAll['_token']);

        //simpan data
        $jenisSampah = JenisSampah::create([
            'kategori_sampah_id' => $requestAll['kategori_sampah_id'],
            'nama_sampah' => $requestAll['nama_sampah'],
        ]);

        if (!$jenisSampah) {
            return \response()->json(["success" => \false], 500);
        }

        return \response()->json(["success" => \true], 200);
    }

    public function edit($id)
    {
        $id2 = \base64_decode($id);
        $kategori = KategoriSampah::all();

        $jenisSampah = JenisSampah::with('kategoriSampah')->find($id2);

        return \view('admin.edit-jenis-sampah', [
            'kategori' => $kategori,
            'data' => $jenisSampah,
        ]);
    }

    public function delete($id)
    {
        $id2 = \base64_decode($id);
        $jenisSampah = JenisSampah::find($id2);

        $result = $jenisSampah->delete();

        if (!$result) {
            return \response()->json(["success" => \false], 500);
        }

        return \response()->json(["success" => \true], 200);
    }
}
