<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminTransaksi extends Controller
{
    public function index()
    {
        return \view('admin.admin-transaksi');
    }

    public function getAllData(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 10;
        $globalSearch = $request['search']['value'];

        $query = Transaksi::with('userTransaksi')->select("*");

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

    public function create()
    {
        $nasabah = User::where('roles', 'user')->get();
        return \view('admin.create-transaksi', ['nasabah' => $nasabah]);
    }

    public function store(Request $request)
    {
        $requestAll = $request->all();
        $no_tr = "TR-" . date('Ymd') . "-" . Str::random(4) . date('s');
        $status = "PENDING";
        //validasi request masuk
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal_transaksi' => 'required',
            ]
        );

        if ($validator->fails()) {
            return \response()->json($validator->errors()->all(), 400);
        }

        //unset token csrf
        unset($requestAll['_token']);

        $transaksi = Transaksi::create([
            'no_transaksi' => $no_tr,
            'tanggal_transaksi' => $requestAll['tanggal_transaksi'],
            'user_id' => $requestAll['user_id'],
            'status' => $status
        ]);

        return \response()->json(['success' => true, 'index' => \base64_encode($transaksi->id)], 200);
    }

    public function prosesTransaksiItem(Request $request, $id)
    {
        $requestAll = $request->all();
        $requestAll['status'] = "SUCCESS";
        //unset token & method
        unset($requestAll['_token']);
        unset($requestAll['_method']);

        $transaksi = Transaksi::findOrfail($id);

        $transaksi->update($requestAll);

        return \response()->json(['success' => \true, 'data' => $transaksi->no_transaksi], 200);
    }

    public function transaksiDetail($id)
    {
        $id2 = \base64_decode($id);

        $transaksi = Transaksi::findOrFail($id2);

        $jenisSampah = JenisSampah::all();

        return \view('admin.create-transaksi-detail', [
            'transaksi' => $transaksi,
            'jenis_sampah' => $jenisSampah
        ]);
    }

    public function dataItemTransaksi(Request  $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 10;
        $globalSearch = $request['search']['value'];
        $transaksiId = $request['transaksi_id'];

        $query = TransaksiDetail::with('jenisSampahTransaksi')->select("*");
        $query->where('transaksi_id', $transaksiId);
        // if ($globalSearch) {
        //     $query->where('no_transaksi', 'like', '%' . $globalSearch . '%')
        //         ->orWhereDate('tanggal_transaksi', $globalSearch);
        // }

        $recordsFiltered = $query->count();

        $resData = $query->skip($offset)
            ->take($limit)
            ->get();

        $recordsTotal = $resData->count();
        $sum = $query->sum('subtotal');
        $data = [];
        $i = $offset + 1;

        if ($resData->isEmpty()) {
            $data['rnum'] = "#";
            $data['jenis_sampah'] = "Data Kosong";
            $data['qty'] = "Data Kosong";
            $data['subtotal'] = "Data Kosong";
            $data['action'] = "#";
            $arr[] = $data;
        } else {
            foreach ($resData as $key => $value) {
                $data['rnum'] = $i;
                $data['jenis_sampah'] = $value->jenisSampahTransaksi->nama_sampah;
                $data['qty'] = $value->qty;
                $data['subtotal'] = $value->subtotal;
                $data['action'] = '<div class="d-flex"></div>';

                $arr[] = $data;
                $i++;
            }
        }

        return \response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr,
            'sum' => $sum
        ]);
    }

    public function transaksiDetailStore(Request $request)
    {
        $requestAll = $request->all();
        //validasi request masuk
        $validator = Validator::make(
            $request->all(),
            [
                'qty' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return \response()->json($validator->errors()->all(), 400);
        }

        $transaksiDetail = TransaksiDetail::create([
            'transaksi_id' => $requestAll['transaksi_id'],
            'jenis_sampah_id' => $requestAll['jenis_sampah_id'],
            'qty' => $requestAll['qty'],
            'subtotal' => $requestAll['subtotal'] ? $requestAll['subtotal'] : 0,
        ]);

        if (!$transaksiDetail) {
            return \response()->json(['success' => false], 500);
        }

        return \response()->json(['success' => \true], 200);
    }

    public function success($id)
    {
        $transaksi = Transaksi::with('userTransaksi')
            ->where('no_transaksi', $id)->first();
        $transaksiItem = TransaksiDetail::with('jenisSampahTransaksi')->where('transaksi_id', $transaksi->id)->get();
        $dataItemTrsc = \collect($transaksiItem);

        return \view('admin.transaksi-success', ['transaksi' => $transaksi, 'transaksiItem' => $dataItemTrsc]);
    }
}
