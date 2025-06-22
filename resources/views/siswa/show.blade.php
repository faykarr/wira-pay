@extends('layouts.layout')
@section('title', 'Detail Data Siswa')
@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Detail Siswa</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-muted text-decoration-none" href="{{ route('siswa.index') }}">Daftar Siswa</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Detail Siswa</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/profile/user-7.jpg') }}" width="110" class="rounded-3 mb-3"
                            alt="Profile Student" />
                        <h5 class="mb-1">{{ Str::title(strtolower($data['siswa']->nama_lengkap)) }}</h5>
                        <span class="badge bg-primary-subtle text-primary fw-light rounded-pill">Student</span>
                    </div>

                    <div class="mt-3">
                        <div class="pb-1 mb-2 border-bottom">
                            <h6>Details</h6>
                        </div>

                        <ul>
                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    NIT:
                                    <span class="fw-light text-secondary ms-1">{{ $data['siswa']->nit }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Nama:
                                    <span
                                        class="fw-light text-secondary ms-1">{{ Str::title(strtolower($data['siswa']->nama_lengkap)) }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Tahun Akademik:
                                    <span
                                        class="fw-light text-secondary ms-1">{{ $data['siswa']->akademik->tahun_akademik }}</span>
                                </p>
                            </li>
                        </ul>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="{{ route('siswa.edit', $data['siswa']->id) }}"
                                    class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                                    <i class="ti ti-edit fs-5 me-2"></i>
                                    Edit
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <button type="button"
                                    class="btn btn-danger w-100 justify-content-center d-flex align-items-center btn-delete"
                                    data-url="{{ route('siswa.destroy', $data['siswa']->id) }}"
                                    data-load="{{ route('siswa.index') }}">
                                    <i class="ti ti-trash fs-5 me-2"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item me-2" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">
                        Pembayaran Registrasi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">
                        Pembayaran SPI
                    </button>
                </li>
            </ul>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h5 class="mb-0">Pembayaran Registrasi</h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge text-bg-danger">Belum Lunas</span>
                                <div class="d-flex justify-content-center">
                                    <sup class="h5 mt-3 mb-0 me-1 text-primary">Rp</sup>
                                    <h1 class="display-5 mb-0 text-primary">1.500.000</h1>
                                    <sub class="fs-6 pricing-duration mt-auto mb-3">/
                                        {{ number_format($data['pembayaran']->registration_fee, 0, ',', '.')}}</sub>
                                </div>
                            </div>
                            <ul class="g-2 my-4">
                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    4x Angsuran
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Kekurangan</span>
                                <span>75% Sudah Lunas</span>
                            </div>
                            <div class="progress bg-light-primary mb-1">
                                <div class="progress-bar bg-primary w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span>Rp. 1.500.000</span>
                            <div class="d-grid w-100 mt-4 pt-2">
                                <button class="btn btn-success" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                    <i class="ti ti-archive fs-5 me-2"></i>
                                    Lihat Riwayat Pembayaran
                                </button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h5 class="mb-0">Pembayaran SPI</h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge text-bg-success">Sudah Lunas</span>
                                <div class="d-flex justify-content-center">
                                    <sup class="h5 mt-3 mb-0 me-1 text-primary">Rp</sup>
                                    <h1 class="display-5 mb-0 text-primary">1.200.000</h1>
                                    <sub
                                        class="fs-6 pricing-duration mt-auto mb-3">/ {{ number_format($data['pembayaran']->spi_fee, 0, ',', '.')}}</sub>
                                </div>
                            </div>
                            <ul class="g-2 my-4">
                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    4 Semester Dibayar
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Kekurangan</span>
                                <span>100% Sudah Lunas</span>
                            </div>
                            <div class="progress bg-light-primary mb-1">
                                <div class="progress-bar bg-primary w-100" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span>Rp. 0</span>
                            <div class="d-grid w-100 mt-4 pt-2">
                                <button class="btn btn-success" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                    <i class="ti ti-archive fs-5 me-2"></i>
                                    Lihat Riwayat Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection