@extends('layouts.admin')

@section('main_title')
    Transaksi Sukses
@endsection
@section('admin_content')
    <style>

    </style>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ route('admin.transaksi') }}" class="btn btn-outline-success">Halaman Utama</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6 prsection">
                <div class="card ">
                    <div class="card-body mx-4">
                        <div class="container">
                            <p class="text-primary fw-bold" style="font-size: 20px;">Terima kasih, Telah Menukarkan Sampah
                                Anda di Bank
                                Sampah</p>
                            <div class="row">
                                <hr>
                                <ul class="list-unstyled">
                                    <li class="text-black fw-bold">Nasabah: {{ $transaksi->userTransaksi->name }}</li>
                                    <li class="text-black mt-1"><span class="text-black">Invoice</span>
                                        # {{ $transaksi->no_transaksi }}</li>
                                    <li class="text-black mt-1">Tanggal Transaksi: {{ $transaksi->tanggal_transaksi }}</li>
                                    <li class="text-black mt-1">Status Transaksi: {{ $transaksi->status }}</li>
                                </ul>
                                <hr>
                                <h6 class="text-primary ">Item:</h6>
                            </div>
                            <div class="row">
                                <div class="my-1 mx-1">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Barang</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($transaksiItem as $valueItem)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $valueItem->jenisSampahTransaksi->nama_sampah }}</td>
                                                    <td>{{ $valueItem->qty }}</td>
                                                    <td>{{ $valueItem->subtotal }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row text-black">
                                <div class="col-xl-12">
                                    <p class="float-end fw-bold">Total: Rp.
                                        {{ number_format($transaksi->total, 0, ',', '.') }}
                                    </p>
                                </div>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="text-center" style="margin-top: 90px;">
                                <p>Struk ini sebagai tanda bukti pembayaran yang sah. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('admin_custom_script')
    <script src="{{ asset('plugins/jquery.PrintArea.js') }}"></script>
    <script src="{{ asset('transaksi/success.min.js?q=') . time() }}"></script>
@endpush
