@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('title', 'Daftar Data Siswa')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Daftar Siswa</h4>
            <div class="d-flex flex-wrap flex-lg-nowrap my-1 my-md-0 align-items-center justify-content-between gap-2">
                <a href="{{ route('siswa.create') }}"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-success d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2"></i>
                    Siswa
                </a>
                <a href="{{ route('siswa.import') }}"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-danger d-flex align-items-center">
                    <i class="ti ti-download fs-4 me-2"></i>
                    Import
                </a>
                <button type="button"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-secondary d-flex align-items-center">
                    <i class="ti ti-upload fs-4 me-2"></i>
                    Export
                </button>
                <a href="{{ asset('assets/docs/Format Daftar NIT - Sistem Pembayaran Wira Bahari.xlsx') }}"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-primary d-flex align-items-center"
                    download="Format Daftar NIT - Sistem Pembayaran Wira Bahari.xlsx">
                    <i class="ti ti-folder fs-4 me-2"></i>
                    Template
                </a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Daftar Siswa</li>
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
                        Status Registrasi
                    </button>
                    <ul class="dropdown-menu p-6" style="">
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-registrasi"
                                        id="all-filter-registrasi" checked>
                                    <label class="form-check-label" for="all-filter-registrasi" checked>
                                        All
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-registrasi"
                                        id="filter-registrasi-lunas">
                                    <label class="form-check-label" for="filter-registrasi-lunas">
                                        Lunas
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-registrasi"
                                        id="filter-registrasi-belum-lunas">
                                    <label class="form-check-label" for="filter-registrasi-belum-lunas">
                                        Belum Lunas
                                    </label>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown border-end">
                    <button class="btn dropdown-toggle shadow-none py-0 px-4 text-dark fw-bold border-0" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Status SPI
                    </button>
                    <ul class="dropdown-menu p-6" style="">
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-spi" id="all-filter-spi"
                                        checked>
                                    <label class="form-check-label" for="all-filter-spi" checked>
                                        All
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-spi" id="filter-spi-lunas">
                                    <label class="form-check-label" for="filter-spi-lunas">
                                        Lunas
                                    </label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item px-6 py-2 rounded-1" href="javascript:void(0)">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filter-spi"
                                        id="filter-spi-belum-lunas">
                                    <label class="form-check-label" for="filter-spi-belum-lunas">
                                        Belum Lunas
                                    </label>
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
                <table id="all-student"
                    class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle"
                    data-url="{{ route('siswa.data') }}">
                    <thead class="align-middle text-center">
                        <tr>
                            <th rowspan="2" scope="col" class="text-center">#</th>
                            <th rowspan="2" scope="col" class="text-center">NIT</th>
                            <th rowspan="2" scope="col" class="text-center">Nama Siswa</th>
                            <th rowspan="2" scope="col" class="text-center">Tahun Akademik</th>
                            <th colspan="2" scope="colgroup" class="text-center">Status</th>
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