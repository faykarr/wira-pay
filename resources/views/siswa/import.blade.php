@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('title', 'Import Data Siswa')

@section('main-content')
<div class="card shadow-none position-relative overflow-hidden mb-2">
    <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Impor Data Siswa</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('siswa.index') }}">Daftar Siswa</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Impor Data Siswa</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card shadow-none mb-4">
    <div class="card-body wizard-content">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="card-title mb-0">Validasi Impor Data Siswa Baru</h4>
            <button type="button" class="btn btn-danger btn-sm" onclick="location.reload()">
                <i class="ti ti-refresh"></i> Refresh Halaman
            </button>
        </div>
        <p class="card-subtitle mb-3">
            Pastikan untuk impor data siswa dengan valid sesuai dengan template format.
            <br>
            <span class="text-danger">1 file excel untuk 1 tahun akademik.</span>
        </p>
        <form action="{{ route('siswa.import.store') }}" method="post" class="validation-wizard wizard-circle mt-5"
            enctype="multipart/form-data">
            @csrf
            <!-- Step 1 -->
            <h6>Step 1</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="wakademik"> Tahun Akademik : <span class="danger">*</span>
                            </label>
                            <select class="form-select @error('akademik') is-invalid @enderror required" id="wakademik"
                                name="akademik">
                                @foreach ($data['akademik'] as $row)
                                    <option value="{{ $row->id }}" {{ old('akademik') == $row->id ? 'selected' : '' }}>
                                        {{ $row->tahun_akademik }}
                                    </option>
                                @endforeach
                            </select>
                            @error('akademik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 2 -->
            <h6>Step 2</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label class="form-label" for="wfile"> File Excel : <span class="danger">*</span>
                            </label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror required"
                                id="wfile" name="file" accept=".xlsx, .xls, .csv" />
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <div class="table-responsive pb-4 w-100">
            {{-- Table title --}}
            <h4 class="card-title">Preview Data Siswa</h4>
            <p class="card-subtitle mb-3">
                Tabel ini menampilkan data siswa yang akan diimpor. Pastikan data yang ditampilkan sudah sesuai.
                <br>
                <span class="text-danger">Jika ada data yang tidak sesuai, silakan perbaiki file excel dan sesuaikan
                    dengan <a
                        href="{{ asset('assets/docs/Format Daftar NIT - Sistem Pembayaran Wira Bahari.xlsx') }}">template</a>,
                    refresh halaman
                    dan unggah ulang.</span>
            </p>
            {{-- Table --}}
            <table id="import-student"
                class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle"
                data-url="{{ route('siswa.import.preview') }}">
                <thead class="align-middle text-center">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">NIT</th>
                        <th scope="col" class="text-center">Nama Siswa</th>
                        <th scope="col" class="text-center">Tahun Akademik</th>
                    </tr>
                </thead>
                <tbody class="text-center"></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/form-wizard.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
@endsection