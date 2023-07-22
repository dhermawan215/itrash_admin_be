<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSampah;
use Illuminate\Support\Facades\Validator;

class AdminKategoriSampah extends Controller
{
    public function index()
    {
        return \view('admin.admin-kategori-sampah');
    }

    public function getAllData(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 10;
        $globalSearch = $request['search']['value'];

        $query = KategoriSampah::select("*");

        if ($globalSearch) {
            $query->where('nama_kategori', 'like', '%' . $globalSearch . '%');
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
            $data['action'] = "#";
            $arr[] = $data;
        } else {
            foreach ($resData as $key => $value) {
                $data['rnum'] = $i;
                $data['index'] = \base64_encode($value->id);
                $data['nama'] = $value->nama_kategori;

                $data['action'] = '<div class="d-flex"><button class="btn btn-sm btn-primary btn-edit-data text-white"
                data-bs-toggle="modal" data-bs-target="#editModal" title="edit"><i class="bi bi-pencil"></i></button>
                </div>';

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

    public function store(Request $request)
    {
        $requestAll = $request->all();

        //validasi request masuk
        $validator = Validator::make(
            $request->all(),
            [
                'nama_kategori' => ['required', 'string', 'max:255'],
            ]
        );

        if ($validator->fails()) {
            return \response()->json($validator->errors()->all(), 400);
        }

        //unset token csrf
        unset($requestAll['_token']);

        //simpan data
        $kategoriSampah = KategoriSampah::create([
            'nama_kategori' => $requestAll['nama_kategori'],
        ]);

        //return value $kategoriSampah
        if ($kategoriSampah) {
            return \response()->json(["success" => \true], 200);
        } else {
            return \response()->json(["success" => \false], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $id2 = \base64_decode($id);

        $requestAll = $request->all();

        //validasi request masuk
        $validator = Validator::make(
            $request->all(),
            [
                'nama_kategori' => ['required', 'string', 'max:255'],
            ]
        );

        if ($validator->fails()) {
            return \response()->json($validator->errors()->all(), 400);
        }

        //unset token csrf
        unset($requestAll['_token']);

        //data kategori
        $kategori = KategoriSampah::find($id2);

        $result = $kategori->update($requestAll);

        if (!$result) {
            return \response()->json(["success" => \false], 500);
        }

        return \response()->json(["success" => \true], 200);
    }
}
