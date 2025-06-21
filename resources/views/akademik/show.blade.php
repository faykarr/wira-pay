@extends('layouts.layout')

@section('title', 'Detail Tahun Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Detail Tahun Akademik</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('akademik.index') }}">Daftar Tahun
                            Akademik</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Detail Tahun Akademik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <h4 class="card-title">Data tahun akademik</h4>
            <p class="card-subtitle mb-3"> Pastikan untuk memeriksa data tahun akademik dengan benar </p>
            <div class="mb-3">
                <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                    <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik"
                        value="{{ old('tahun_akademik', $data->tahun_akademik) }}" readonly>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('akademik.edit', $data->id) }}" class="btn btn-primary rounded-pill px-4">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-edit me-2 fs-4"></i>
                        Edit
                        </div> </a>
                        <a href="{{ route('akademik.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                    </div>
            </div>
        </div>
@endsection