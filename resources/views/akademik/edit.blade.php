@extends('layouts.layout')

@section('title', 'Edit Tahun Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Edit Tahun Akademik</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Edit Tahun Akademik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <h4 class="card-title">Validasi edit tahun akademik</h4>
            <p class="card-subtitle mb-3"> Pastikan untuk mengedit data tahun akademik yang valid </p>

            <form action="{{ route('akademik.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                    <input type="text" class="form-control @error('tahun_akademik') is-invalid @enderror"
                        id="tahun_akademik" name="tahun_akademik" placeholder="Contoh: 2023/2024"
                        value="{{ old('tahun_akademik', $data->tahun_akademik) }}" required>
                    @error('tahun_akademik')
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
                    <a href="{{ route('akademik.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#tahun_akademik').inputmask({
                mask: '9999/9999',
                placeholder: 'YYYY/YYYY',
                showMaskOnHover: false,
                showMaskOnFocus: true
            });
        });
    </script>
@endsection