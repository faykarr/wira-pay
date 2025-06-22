@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('title', 'Master Data Pembayaran')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Master Data Pembayaran</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Master Data Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <div class="table-responsive pb-4 w-100">
                <table id="all-pembayaran"
                    class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle"
                    data-url="{{ route('pembayaran.data') }}">
                    <thead class="align-middle text-center">
                        <tr>
                            <th rowspan="2" scope="col" class="text-center">#</th>
                            <th rowspan="2" scope="col" class="text-center">Tahun Akademik</th>
                            <th colspan="2" scope="colgroup" class="text-center">Jenis Pembayaran</th>
                            <th rowspan="2" scope="col" class="text-center">Action</th>
                        </tr>
                        <tr>
                            <th class="text-center">Registrasi</th>
                            <th class="text-center">SPI</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
@endsection