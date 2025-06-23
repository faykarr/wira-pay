@extends('layouts.layout')

@section('title', 'Edit Data Siswa')

@section('main-content')
<div class="card shadow-none position-relative overflow-hidden mb-2">
    <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Edit Siswa</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('siswa.index') }}">Daftar Siswa</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Edit Siswa</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card shadow-none mb-4">
    <div class="card-body wizard-content">
        <h4 class="card-title">Validasi edit siswa</h4>
        <p class="card-subtitle mb-3"> Pastikan untuk mengisi data siswa dengan valid </p>
        <form action="{{ route('siswa.update', $data['siswa']->id) }}" method="post"
            class="validation-wizard wizard-circle mt-5">
            @csrf
            @method('PUT')
            <!-- Step 1 -->
            <h6>Step 1</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wNIT"> NIT : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('NIT') is-invalid @enderror required"
                                id="wNIT" name="NIT" placeholder="Contoh : 22.24.785"
                                value="{{ old('NIT', $data['siswa']->nit) }}" />
                            @error('NIT')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wfullName"> Nama Lengkap : <span class="danger">*</span>
                            </label>
                            <input type="text"
                                class="form-control @error('fullName') is-invalid @enderror text-uppercase required"
                                id="wfullName" name="fullName"
                                value="{{ old('fullName', $data['siswa']->nama_lengkap) }}" />
                            @error('fullName')
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
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="wakademik"> Tahun Akademik : <span class="danger">*</span>
                            </label>
                            <select class="form-select @error('akademik') is-invalid @enderror required" id="wakademik"
                                name="akademik">
                                @foreach ($data['akademik'] as $row)
                                    <option value="{{ $row->id }}" {{ $data['siswa']->akademik_id == $row->id ? 'selected' : '' }}>
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
        </form>
    </div>
</div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/form-wizard.js') }}"></script>
@endsection