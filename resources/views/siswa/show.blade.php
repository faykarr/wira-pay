@extends('layouts.layout')
@section('title', 'Detail Siswa')
@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Detail Siswa</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
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
                        <h5 class="mb-1">{{ Str::title(strtolower($siswa->nama_lengkap)) }}</h5>
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
                                    <span class="fw-light text-secondary ms-1">{{ $siswa->nit }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Nama:
                                    <span
                                        class="fw-light text-secondary ms-1">{{ Str::title(strtolower($siswa->nama_lengkap)) }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Tahun Akademik:
                                    <span class="fw-light text-secondary ms-1">{{ $siswa->akademik->tahun_akademik }}</span>
                                </p>
                            </li>

                            <li class="py-2">
                                <p class="fw-normal text-dark mb-0">
                                    Jurusan:
                                    <span class="fw-light text-secondary ms-1">{{ $siswa->jurusan->nama_jurusan }}</span>
                                </p>
                            </li>
                        </ul>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="{{ route('siswa.edit', $siswa->id) }}"
                                    class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                                    <i class="ti ti-edit fs-5 me-2"></i>
                                    Edit
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <button type="button"
                                    class="btn btn-danger w-100 justify-content-center d-flex align-items-center btn-delete"
                                    data-url="{{ route('siswa.destroy', $siswa->id) }}"
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
                        Progress Report
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">
                        Fees
                    </button>
                </li>
            </ul>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h5 class="mb-0">Progress Report</h5>
                            </div>
                            <div class="table-responsive overflow-x-auto">
                                <table class="table align-middle text-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Marks</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-top">
                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-0 fs-3 text-dark">
                                                    M103
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-dark mb-0 fw-normal">
                                                    Mathematics
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <small class="mb-1">90%</small>
                                                    <div class="progress w-100 me-3 bg-success-subtle">
                                                        <div class="progress-bar w-90 text-bg-success" aria-valuenow="90%"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-success mb-0">A</p>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-success mb-0">Pass</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-0 fs-3 text-dark">
                                                    S221
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-dark mb-0 fw-normal">
                                                    Science
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <small class="mb-1">70%</small>
                                                    <div class="progress w-100 me-3 bg-warning-subtle">
                                                        <div class="progress-bar w-70 text-bg-warning" aria-valuenow="70%"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-warning mb-0">B</p>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-success mb-0">Pass</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-0 fs-3 text-dark">
                                                    E452
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-dark mb-0 fw-normal">
                                                    English
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <small class="mb-1">50%</small>
                                                    <div class="progress w-100 me-3 bg-danger-subtle">
                                                        <div class="progress-bar w-50 text-bg-danger" aria-valuenow="50%"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-danger mb-0">C</p>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-success mb-0">Pass</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class="fw-normal mb-0 fs-3 text-dark">
                                                    B541
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-dark mb-0 fw-normal">
                                                    Biology
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <small class="mb-1">25%</small>
                                                    <div class="progress w-100 me-3 bg-primary-subtle">
                                                        <div class="progress-bar w-25 text-bg-primary" aria-valuenow="25%"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-primary mb-0">E</p>
                                            </td>
                                            <td>
                                                <p class="fw-bold text-danger mb-0">Fail</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="mb-4 border-bottom pb-3">
                                <h5 class="mb-0">Fees Report</h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-start">
                                <span class="badge text-bg-primary">Standard</span>
                                <div class="d-flex justify-content-center">
                                    <sup class="h5 mt-3 mb-0 me-1 text-primary">$</sup>
                                    <h1 class="display-5 mb-0 text-primary">650</h1>
                                    <sub class="fs-6 pricing-duration mt-auto mb-3">/6 month</sub>
                                </div>
                            </div>
                            <ul class="g-2 my-4">
                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    1 Sem Fees
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Included Documents
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Library Fee
                                </li>

                                <li class="mb-2 align-middle">
                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                                    Student Service Fees
                                </li>
                            </ul>
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span>Days</span>
                                <span>75% Completed</span>
                            </div>
                            <div class="progress bg-light-primary mb-1">
                                <div class="progress-bar bg-primary w-75" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span>4 days remaining</span>
                            <div class="d-grid w-100 mt-4 pt-2">
                                <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                                    Pay Full Fees
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection