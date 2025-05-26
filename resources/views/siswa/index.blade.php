@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('title', 'Daftar Siswa')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Daftar Siswa</h4>
            <div class="d-flex my-1 my-md-0 align-items-center justify-content-between gap-2">
                <button type="button"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-success d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2"></i>
                    Siswa
                </button>
                <button type="button"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-danger d-flex align-items-center">
                    <i class="ti ti-download fs-4 me-2"></i>
                    Import
                </button>
                <button type="button"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-secondary d-flex align-items-center">
                    <i class="ti ti-upload fs-4 me-2"></i>
                    Export
                </button>
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
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-2 p-4">
            <div>
                <label for="search" class="mb-1 ms-2">Search</label>
                <div class="position-relative">
                    <input id="search" type="text" class="form-control rounded-3 py-2 ps-5"
                        placeholder="Cari nama atau nit ...">
                    <iconify-icon icon="solar:magnifer-linear"
                        class="text-dark position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></iconify-icon>
                </div>
            </div>
            <div>
                <label for="jurusan" class="mb-1 ms-2">Jurusan</label>
                <div class="position-relative">
                    <select name="jurusan" id="jurusan" class="form-control rounded-3 py-2 ps-5">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="nkpi">NKPI</option>
                        <option value="perhotelan">Perhotelan</option>
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
                    <i class="ti ti-search fs-4 me-2"></i>
                    Search
                </button>
            </div>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <div class="table-responsive pb-4 w-100">
                <table id="all-student"
                    class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle">
                    <thead class="align-middle text-center">
                        <tr>
                            <th rowspan="2" scope="col">#</th>
                            <th rowspan="2" scope="col">NIT</th>
                            <th rowspan="2" scope="col">Nama Siswa</th>
                            <th rowspan="2" scope="col">Jurusan</th>
                            <th colspan="2" scope="colgroup">Status</th>
                            <th rowspan="2" scope="col">Action</th>
                        </tr>
                        <tr>
                            <th>Registrasi</th>
                            <th>SPI</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1.</td>
                            <td>21.230.0194</td>
                            <td>Nasyath Faykar</td>
                            <td>Perhotelan</td>
                            <td><span class="badge bg-danger">Belum Lunas</span></td>
                            <td><span class="badge bg-success">Lunas</span></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-success">Lihat</button>
                                    <button class="btn btn-sm btn-warning">Edit</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
@endsection