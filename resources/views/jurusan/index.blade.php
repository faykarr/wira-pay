@extends('layouts.layout')

@section('css-links')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('title', 'Daftar Jurusan Akademik')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Daftar Jurusan Akademik</h4>
            <div class="d-flex my-1 my-md-0 align-items-center justify-content-between gap-2">
                <a href="{{ route('jurusan.create') }}"
                    class="justify-content-center w-100 btn btn-sm btn-rounded btn-success d-flex align-items-center">
                    <i class="ti ti-plus fs-4 me-2"></i>
                    Jurusan Akademik
                </a>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Daftar Jurusan Akademik</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <div class="table-responsive pb-4 w-100">
                <table id="all-jurusan"
                    class="table w-100 table-outer-border table-hover rounded-3 text-nowrap align-middle"
                    data-url="{{ route('jurusan.data') }}">
                    <thead class="align-middle text-center">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Jurusan Akademik</th>
                            <th scope="col" class="text-center">Jumlah Siswa</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-links')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable.init.js') }}"></script>
@endsection