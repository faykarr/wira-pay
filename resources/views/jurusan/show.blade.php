@extends('layouts.layout')

@section('title', 'Detail Tahun Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Detail Jurusan Akademik</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('jurusan.index') }}">Daftar Jurusan
                            Akademik</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Detail Jurusan Akademik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <h4 class="card-title">Data jurusan akademik</h4>
            <p class="card-subtitle mb-3"> Pastikan untuk memeriksa data jurusan akademik dengan benar </p>
            <div class="mb-3">
                <label for="nama_jurusan" class="form-label">Jurusan Akademik</label>
                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan"
                    value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" readonly>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('jurusan.edit', $jurusan->id) }}" class="btn btn-primary rounded-pill px-4">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-edit me-2 fs-4"></i>
                        Edit
                    </div>
                </a>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
            </div>
        </div>
    </div>
@endsection