@extends('layouts.layout')

@section('title', 'Daftar Siswa')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body d-flex align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Daftar Siswa</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Daftar Siswa</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection