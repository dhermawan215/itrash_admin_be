@extends('layouts.admin')

@section('main_title')
Transaksi Dashboard
@endsection
@section('admin_content')
<style>
    .dataTables_filter {
        margin-bottom: 15px;
    }
</style>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-xl-12 col-xxl-12 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="flex">
                                <a href="{{ route('admin.transaksi.create') }}" id="btnAdd" class="btn btn-primary m-3 p-2">Buat Transaksi</a>
                            </div>

                            <div class="card-header">
                                <h5 class="h5 fw-bold">Transaksi Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <table id="tableTransaksi" class="table table-striped" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No Tr</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Status</th>
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

    </div>
</div>
@endsection
@push('admin_custom_script')
<script src="{{ asset('transaksi/view.min.js?q=') . time() }}"></script>
@endpush