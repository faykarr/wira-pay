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
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-center gap-2 p-4">
            <div>
                <label for="tahun_akademik" class="mb-1 ms-2">Tahun Akademik</label>
                <div class="position-relative">
                    <select name="tahun_akademik" id="tahun_akademik" class="form-control rounded-3 py-2 ps-5">
                        <option value="">-- Pilih Tahun --</option>
                        @foreach ($data['akademik'] as $row)
                            <option value="{{ $row->id }}" {{ old('akademik') == $row->id ? 'selected' : '' }}>
                                {{ $row->tahun_akademik }}
                            </option>
                        @endforeach
                    </select>
                    <iconify-icon icon="solar:settings-minimalistic-linear"
                        class="text-dark position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></iconify-icon>
                </div>
            </div>
            <div>
                <label for="registrasi" class="mb-1 ms-2">Status Registrasi</label>
                <div class="position-relative">
                    <select name="registrasi" id="registrasi" class="form-control rounded-3 py-2 ps-5">
                        <option value="">-- Pilih Status --</option>
                        <option value="lunas">Lunas</option>
                        <option value="belum-lunas">Belum Lunas</option>
                    </select>
                    <iconify-icon icon="solar:wallet-money-linear"
                        class="text-dark position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></iconify-icon>
                </div>
            </div>
            <div>
                <label for="spi" class="mb-1 ms-2">Status SPI</label>
                <div class="position-relative">
                    <select name="spi" id="spi" class="form-control rounded-3 py-2 ps-5">
                        <option value="">-- Pilih Status --</option>
                        <option value="lunas">Lunas</option>
                        <option value="belum-lunas">Belum Lunas</option>
                    </select>
                    <iconify-icon icon="solar:wad-of-money-linear"
                        class="text-dark position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></iconify-icon>
                </div>
            </div>
            <div>
                <button type="button"
                    class="justify-content-center w-100 mt-4 btn py-2 btn-rounded btn-primary d-flex align-items-center">
                    <i class="ti ti-filter fs-5 me-2"></i>
                    Filter
                </button>
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