@extends('layouts.admin')

@section('main_title')
    Jenis Sampah - Tambah Data
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
                                    <h5 class="h5 fw-bold text-white">Formulir tambah jenis sampah data</h5>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="formAddJenisSampah" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="kategori_sampah" class="form-label">Kategori Sampah</label>
                                            <select name="kategori_sampah_id" id="kategori_sampah" class="form-control">
                                                <option selected>-Pilih Kategori-</option>
                                                @foreach ($kategori as $value)
                                                    <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_sampah" class="form-label">Nama Sampah</label>
                                            <input type="text" placeholder="nama sampah" name="nama_sampah"
                                                id="nama_sampah" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success" id="btnSave">Simpan</button>
                                            <a href="{{ route('admin.jenis_sampah') }}"
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
    <script src="{{ asset('jenis-sampah/create.min.js?q=') . time() }}"></script>
@endpush
