@extends('layouts.admin')

@section('main_title')
    Transaksi - Buat Transaksi
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
                                <div class="card-header bg-primary">
                                    <h5 class="h5 fw-bold text-white">Formulir buat transaksi</h5>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="formTransaksi" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="kategori_sampah" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="user_id" class="form-label">Nasabah/Pelanggan</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option selected>-Pilih Nasabah-</option>
                                                @foreach ($nasabah as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option selected>-Pilih status-</option>
                                                <option value="PENDING">PENDING</option>
                                                <option value="BERHASIL">BERHASIL</option>
                                            </select>
                                        </div> --}}
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success" id="btnSave">Simpan</button>
                                            <a href="{{ route('admin.transaksi') }}"
                                                class="btn btn-outline-danger"">Kembali</a>
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
    <script src="{{ asset('transaksi/create.min.js?q=') . time() }}"></script>
@endpush
