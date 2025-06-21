@extends('layouts.layout')

@section('title', 'Tambah Tahun Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Tambah Jurusan Akademik</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('jurusan.index') }}">Daftar Jurusan Akademik</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Tambah Jurusan Akademik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <h4 class="card-title">Validasi tambah jurusan akademik</h4>
            <p class="card-subtitle mb-3"> Pastikan untuk mengisi data jurusan akademik yang valid </p>

            <form action="{{ route('jurusan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tahun_akademik" class="form-label">Nama Jurusan Akademik</label>
                    <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan"
                        name="nama_jurusan" placeholder="Contoh: Teknik Informatika" value="{{ old('nama_jurusan') }}"
                        required>
                    @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i>
                            Submit
                        </div>
                    </button>
                    <a href="{{ route('jurusan.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection