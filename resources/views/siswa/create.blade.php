@extends('layouts.layout')

@section('title', 'Tambah Siswa')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Tambah Siswa</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Siswa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body wizard-content">
            <h4 class="card-title">Validasi tambah siswa baru</h4>
            <p class="card-subtitle mb-3"> Pastikan untuk mengisi data siswa dengan valid </p>
            <form action="{{ route('siswa.store') }}" method="post" class="validation-wizard wizard-circle mt-5">
                @csrf
                <!-- Step 1 -->
                <h6>Step 1</h6>
                <section>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="wNIT"> NIT : <span class="danger">*</span>
                                </label>
                                <input type="text" class="form-control required" id="wNIT" name="NIT"
                                    placeholder="Contoh : 22.24.785" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="wfullName"> Nama Lengkap : <span class="danger">*</span>
                                </label>
                                <input type="text" class="form-control text-uppercase required" id="wfullName"
                                    name="fullName" />
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 2 -->
                <h6>Step 2</h6>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="wakademik"> Tahun Akademik : <span class="danger">*</span>
                                </label>
                                <select class="form-select required" id="wakademik" name="akademik">
                                    <option value="">Tahun Akademik</option>
                                    <option value="2025/2026">2025/2026</option>
                                    <option value="2024/2025">2024/2025</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2022/2023">2022/2023</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="wjurusan"> Pilih Jurusan : <span class="danger">*</span>
                                </label>
                                <select class="form-select required" id="wjurusan" name="jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    <option value="NKPI">NAUTIKA KAPAL PENANGKAP IKAN (NKPI)</option>
                                    <option value="Perhotelan">PERHOTELAN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/form-wizard.js') }}"></script>
@endsection