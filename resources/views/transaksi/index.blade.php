@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('title', 'Riwayat Transaksi Pembayaran')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Riwayat Transaksi Pembayaran</h4>
            <div class="d-flex my-1 my-md-0 align-items-center justify-content-between gap-2">
                <a href="{{ route('payments.create') }}"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-primary d-flex align-items-center">
                    <i class="ti ti-currency-dollar fs-4 me-2"></i>
                    Transaksi Baru
                </a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Riwayat Transaksi Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card mb-2">
        <div class="card-body px-4 py-3">
            <div class="d-flex align-items-center flex-wrap">
                <p class="m-0 p-0">
                    <i class="ti ti-filter fs-5"></i>
                    Filter by :
                </p>
                <div class="dropdown border-end">
                    <button class="btn dropdown-toggle shadow-none py-0 px-4 text-dark fw-bold border-0" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Tahun Akademik
                    </button>
                    <ul class="dropdown-menu p-6">
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="all-filter-akademik"
                                        checked>
                                    <label class="form-check-label d-block" for="all-filter-akademik">
                                        All
                                    </label>
                                </div>
                            </a>
                        </li>
                        @foreach ($data['akademik'] as $row)
                            <li>
                                <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $row->id }}"
                                            id="{{ $row->tahun_akademik }}">
                                        <label class="form-check-label d-block" for="{{ $row->tahun_akademik }}">
                                            {{ $row->tahun_akademik }}
                                        </label>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="dropdown border-end">
                    <button class="btn dropdown-toggle shadow-none py-0 px-4 text-dark fw-bold border-0" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Jenis Pembayaran
                    </button>
                    <ul class="dropdown-menu p-6" style="">
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-jenis" id="all-filter-jenis"
                                        checked>
                                    <label class="form-check-label" for="all-filter-jenis" checked>
                                        All
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-jenis" id="filter-jenis-spi">
                                    <label class="form-check-label" for="filter-jenis-spi">
                                        SPI
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-jenis"
                                        id="filter-jenis-registrasi">
                                    <label class="form-check-label" for="filter-jenis-registrasi">
                                        Registrasi
                                    </label>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown border-end">
                    <button class="btn dropdown-toggle shadow-none py-0 px-4 text-dark fw-bold border-0" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Periode Pembayaran
                    </button>
                    <ul class="dropdown-menu p-6" style="">
                        {{-- Data range --}}
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="all-filter-periode" checked>
                                    <label class="form-check-label" for="all-filter-periode">
                                        All
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="filter-periode-1">
                                    <label class="form-check-label" for="filter-periode-1">
                                        Bulan Ini
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="filter-periode-2">
                                    <label class="form-check-label" for="filter-periode-2">
                                        Bulan Lalu
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="filter-periode-3">
                                    <label class="form-check-label" for="filter-periode-3">
                                        Tahun Ini
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="filter-periode-4">
                                    <label class="form-check-label" for="filter-periode-4">
                                        Tahun Lalu
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-periode"
                                        id="filter-periode-5">
                                    <label class="form-check-label" for="filter-periode-5">
                                        Kustom
                                    </label>
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        <input type="date" class="form-control form-control-sm" id="filter-periode-start"
                                            placeholder="Mulai">
                                        <input type="date" class="form-control form-control-sm" id="filter-periode-end"
                                            placeholder="Selesai">
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <div class="table-responsive pb-4 w-100">
                <table id="all-payments"
                    class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle"
                    data-url="{{ route('payments.data') }}">
                    <thead class="align-middle text-center">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Kode</th>
                            <th scope="col" class="text-center">NIT</th>
                            <th scope="col" class="text-center">Nama Siswa</th>
                            <th scope="col" class="text-center">Pembayaran</th>
                            <th scope="col" class="text-center">Nominal</th>
                            <th scope="col" class="text-center">Angsuran/Semester</th>
                            <th scope="col" class="text-center">Waktu</th>
                            <th scope="col" class="text-start">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
@endsection