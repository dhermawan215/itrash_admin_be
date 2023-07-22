@extends('layouts.admin')

@section('main_title')
    Kategori Sampah
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
                                <div class="flex">
                                    <button id="btnAdd" class="btn btn-success m-3 p-2" data-bs-toggle="modal"
                                        data-bs-target="#addModalKategoriSampah">+ Tambah Data</button>
                                </div>

                                <div class="card-header">
                                    <h5 class="h5 fw-bold">Kategori sampah data </h5>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <table id="tableKategoriSampah" class="table table-striped" style="width:100%">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama</th>
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
                </div>
            </div>

            {{-- add modal --}}
            <div class="modal fade" id="addModalKategoriSampah" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Sampah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="formAddKategoriSampah" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" placeholder="nama kategori" name="nama_kategori"
                                        id="nama_kategori" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success" id="btnSave">Simpan Data</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                        </div>
                    </div>
                </div>
            </div>
            {{-- edit modal --}}
            <div class="modal fade editModal" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Sampah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:;" id="formEditKategoriSampah" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" id="indexData">
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" placeholder="nama kategori" name="nama_kategori"
                                        id="edit_nama_kategori" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success" id="btnUupdate">Perbarui Data</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('admin_custom_script')
    <script src="{{ asset('kategori-sampah/view.min.js?q=') . time() }}"></script>
@endpush
