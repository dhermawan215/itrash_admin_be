@extends('layouts.admin')

@section('main_title')
Pembayaran Dashboard
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
                            <div class="card-header">
                                <h5 class="h5 fw-bold">Pembayaran Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <table id="tablePembayaran" class="table table-striped" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">No Tr</th>
                                                <th scope="col">Nasabah</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Tanggal</th>
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

                <!-- modal -->
                <div class="modal fade" id="formShowPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                            </div>
                            <div class="modal-body">
                                <p>No Transaksi: <span class="text-danger" id="noTransaksi"></span></p>
                                <p>Nasabah: <span class="text-danger" id="Nasabah"></span></p>
                                <p>Total: <span class="text-danger" id="TotalPembayaran"></span></p>
                                <p>Tanggal: <span class="text-danger" id="TanggalPembayaran"></span></p>
                                <p>Keterangan: <span class="text-danger" id="KeteranganPembayaran"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

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
<script src="{{ asset('pembayaran/view.min.js?q=') . time() }}"></script>
@endpush