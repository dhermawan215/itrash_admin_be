@extends('layouts.admin')

@section('main_title')
    Jenis Sampah - Edit Data
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
                                    <h5 class="h5 fw-bold text-white">Formulir edit jenis sampah: {{ $data->nama_sampah }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:;" id="formEditJenisSampah" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                                        <div class="mb-3">
                                            <label for="kategori_sampah" class="form-label">Kategori Sampah</label>
                                            <select name="kategori_sampah_id" id="kategori_sampah" class="form-control">
                                                <option value="{{ $data->kategori_sampah_id }}">
                                                    {{ $data->kategoriSampah->nama_kategori }}</option>
                                                <option>-Pilih Kategori-</option>
                                                @foreach ($kategori as $value)
                                                    <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_sampah" class="form-label">Nama Sampah</label>
                                            <input type="text" placeholder="nama sampah" name="nama_sampah"
                                                id="nama_sampah" class="form-control" value="{{ $data->nama_sampah }}">
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
    <script src=" {{ asset('jenis-sampah/edit.min.js?q=') . time() }}"></script>
@endpush
