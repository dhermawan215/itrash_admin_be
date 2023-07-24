@extends('layouts.admin')

@section('main_title')
    Transaksi - Buat Detail Transaksi
@endsection
@section('admin_content')
    <style>
        .dataTables_filter {
            margin-bottom: 15px;
        }
    </style>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-xl-12 col-xxl-6 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5>No Transaksi: <span class="text-danger">{{ $transaksi->no_transaksi }}</span></h5>
                                    <p>Tanggal Transaksi: <span
                                            class="text-danger">{{ $transaksi->tanggal_transaksi }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- form tambah item --}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h5 class="h5 fw-bold text-white">Formulir buat transaksi detail</h5>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="formTransakasiItemDetail" method="post">
                                        @csrf
                                        <input type="hidden" name="transaksi_id" id="transaksiId"
                                            value="{{ $transaksi->id }}">
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label class="form-label text-primary fw-bold" for="">Jenis
                                                    Sampah</label>
                                                <select name="jenis_sampah_id" id="jenisSampah" class="form-control">
                                                    <option selected>-Pilih Jenis Sampah-</option>
                                                    @foreach ($jenis_sampah as $valsampah)
                                                        <option value="{{ $valsampah->id }}">{{ $valsampah->nama_sampah }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-3 ms-3">
                                                <label class="form-label text-primary fw-bold" for="">Qty
                                                    Sampah(Kg)</label>
                                                <input type="number" class="form-control" name="qty" id="qty">
                                            </div>
                                            <div class="col-lg-3 ms-3">
                                                <label class="form-label text-primary fw-bold" for="subTotal">Subtotal
                                                    (Rp)</label>
                                                <input type="number" class="form-control" name="subtotal" id="subTotal">
                                            </div>
                                            <div class="col-lg-3 ms-2 ps-3 px-3 py-4 mt-1">
                                                <button type="submit" class="btn btn-success">+ Tambah</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- data item transaksi --}}
                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="h5 fw-bold text-white">Item Transaksi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tableItemTransaksi" class="table table-striped" style="width:100%">
                                            <thead class="bg-info text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Jenis Sampah</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Sub Total</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  total biaya --}}
                    <div class="row mt-1">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="javascript:;" id="formTotalTransaksi" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex">
                                            <div class="col-lg-9 ms-3">
                                                <label class="form-label text-primary fw-bold" for="total">Total
                                                    (Rp)</label>
                                                <input type="number" class="form-control" name="total" id="total"
                                                    readonly>
                                            </div>
                                            <div class="col-lg-3 ms-2 ps-3 px-3 py-4 mt-1">
                                                <button type="submit" class="btn btn-success">Proses Transaksi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_custom_script')
    <script src=" {{ asset('transaksi/create-detail.min.js?q=') . time() }}"></script>
@endpush
