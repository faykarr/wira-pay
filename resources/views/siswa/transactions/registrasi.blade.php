@extends('layouts.layout')
@section('title', 'Riwayat Pembayaran Siswa')
@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Riwayat Pembayaran Siswa</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-muted text-decoration-none" href="{{ route('siswa.index') }}">Daftar Siswa</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="text-muted text-decoration-none"
                            href="{{ route('siswa.show', $data['siswa_id']) }}">Detail Siswa</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Riwayat Pembayaran</li>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive w-100">
                        <table id="history-payments"
                            class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle">

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Riwayat Pembayaran Registrasi</h5>
                                <a href="{{ route('siswa.show', $data['siswa_id']) }}"
                                    class="btn btn-danger btn-sm">Kembali</a>
                            </div>

                            <thead class="align-middle text-center">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Kode</th>
                                    <th scope="col" class="text-center">Pembayaran</th>
                                    <th scope="col" class="text-center">Nominal</th>
                                    <th scope="col" class="text-center">Angsuran</th>
                                    <th scope="col" class="text-center">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($data['siswa']->payments->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">Belum ada riwayat pembayaran</td>
                                    </tr>
                                @else
                                    @foreach ($data['siswa']->payments as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span
                                                    class="badge bg-success-subtle text-success border-success border fs-2">{{ $row->kode_transaksi }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-danger-subtle rounded-pill text-danger border-danger border fs-2">
                                                    Pembayaran {{ $row->jenis_pembayaran }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">Rp
                                                    {{ number_format($row->nominal, 0, ',', '.') }}</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-danger-subtle rounded-pill text-danger border-danger border fs-2">
                                                    Angsuran {{ $row->angsuran }}
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-primary-subtle rounded-pill text-primary border-primary border fs-2">
                                                    {{ Carbon\Carbon::parse($row->tanggal_transaksi)->locale('id')->isoFormat('D MMMM Y') }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection