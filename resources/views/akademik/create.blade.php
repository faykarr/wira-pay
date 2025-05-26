@extends('layouts.layout')

@section('title', 'Tambah Tahun Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Tambah Tahun Akademik</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Tahun Akademik</li>
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
            </form>
        </div>
    </div>
@endsection

@section('js-links')
@endsection