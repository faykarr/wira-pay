@extends('layouts.layout')

@section('title', 'Transaksi Baru')

@section('main-content')
<div class="card shadow-none position-relative overflow-hidden mb-2">
    <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
        <h4 class="fw-semibold mb-0">Transaksi Pembayaran Baru</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="{{ route('payments.index') }}">Riwayat
                        Transaksi</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Transaksi Baru</li>
            </ol>
        </nav>
    </div>
</div>

{{-- List all error --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Ada kesalahan dalam pengisian data!</h4>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-none mb-4">
    <div class="card-body wizard-content">
        <h4 class="card-title">Validasi Transaksi Pembayaran Baru</h4>
        <p class="card-subtitle mb-3">Pastikan untuk mengisi data transaksi dengan valid &
            benar,<br> <span class="text-danger">karena data transaksi tidak bisa diedit & dihapus.</span> </p>
        <form action="{{ route('payments.store') }}" method="post" class="validation-wizard wizard-circle mt-5">
            @csrf
            {{-- Step 1 --}}
            <h6>Jenis Pembayaran</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label " for="wjenisPembayaran">Jenis Pembayaran : <span
                                    class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenis_pembayaran') is-invalid @enderror required"
                                id="wjenisPembayaran" name="jenis_pembayaran">
                                <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                <option value="Registrasi" {{ old('jenis_pembayaran') == 'Registrasi' ? 'selected' : '' }}>Pembayaran Registrasi</option>
                                <option value="SPI" {{ old('jenis_pembayaran') == 'SPI' ? 'selected' : '' }}>
                                    Pembayaran SPI</option>
                            </select>
                            @error('jenis_pembayaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 2 -->
            <h6>Cari Siswa</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wnit"> NIT Siswa : <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('nit') is-invalid @enderror required"
                                id="wnit" name="nit" placeholder="Contoh : 22.24.785" value="{{ old('nit') }}" autofocus
                                data-url="{{ route('payments.fetch-info') }}" />
                            <span id="nitLoading" class="spinner-border spinner-border-sm ms-2 mt-2 d-none"></span>
                            <input type="hidden" name="siswa_id" id="siswa_id">
                            <input type="hidden" id="hidden_status">
                            @error('nit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wfullName"> Nama Siswa :
                            </label>
                            <input type="text" class="form-control text-uppercase" id="wfullName"
                                value="Silakan isi NIT Siswa" name="nama_lengkap" readonly disabled />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="wtahunAkademik"> Tahun Akademik :
                            </label>
                            <input type="text" class="form-control" name="tahun_akademik" id="wtahunAkademik"
                                value="Silakan isi NIT Siswa" readonly disabled />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="wstatusPembayaran">Status Pembayaran :
                            </label>
                            <input type="text" class="form-control" id="wstatusPembayaran" name="status_pembayaran"
                                value="Silakan isi NIT Siswa" readonly disabled />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="wremaining">Kekurangan Pembayaran :
                            </label>
                            <input type="text" class="form-control" id="wremaining" name="remaining_payment"
                                value="Silakan isi NIT Siswa" readonly disabled />
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 3 -->
            <h6>Transaksi</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wkodeTransaksi">Kode Transaksi :
                            </label>
                            <input type="text"
                                class="form-control wkodeTransaksi @error('kode_transaksi') is-invalid @enderror"
                                id="wkodeTransaksi" value="{{ old('kode_transaksi') }}" readonly disabled />
                            <input type="hidden" class="wkodeTransaksi" name="kode_transaksi">
                            @error('kode_transaksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wtanggalTransaksi">Tanggal Transaksi : <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('created_at') is-invalid @enderror required"
                                id="wtanggalTransaksi" name="created_at" value="{{ old('created_at') }}" />
                            @error('created_at')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wnominalPembayaran">Nominal Pembayaran : <span
                                    class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" id="wnominalPembayaran_rp" disabled>Rp</span>
                                <input type="text" class="form-control @error('nominal') is-invalid @enderror required"
                                    id="wnominalPembayaran" name="nominal" placeholder="Contoh: 3.000.000"
                                    value="{{ old('nominal') }}" aria-describedby="wnominalPembayaran_rp" />
                                @error('nominal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wangsuranKe">Untuk Pembayaran Angsuran/Semester Ke :
                            </label>
                            <input type="text" class="form-control wangsuranKe @error('angsuran') is-invalid @enderror"
                                id="wangsuranKe" name="angsuran" value="{{ old('angsuran') }}" readonly disabled />
                            <input type="hidden" name="angsuran" class="wangsuranKe">
                            @error('angsuran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                </div>
            </section>
            <!-- Step 4 -->
            <h6>Rekap & Konfirmasi</h6>
            <section>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h5>Rekap Transaksi</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <td id="rekapKodeTransaksi"></td>
                                </tr>
                                <tr>
                                    <th>NIT Siswa</th>
                                    <td id="rekapNIT">22.240.265</td>
                                </tr>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td id="rekapNama">Nasyath Faykar</td>
                                </tr>
                                <tr>
                                    <th>Tahun Akademik</th>
                                    <td id="rekapTahunAkademik">2022/2023</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <td id="rekapTanggalTransaksi"></td>
                                </tr>
                                <tr>
                                    <th>Jenis Pembayaran</th>
                                    <td id="rekapJenisPembayaran"></td>
                                </tr>
                                <tr>
                                    <th>Nominal Pembayaran</th>
                                    <td id="rekapNominalPembayaran"></td>
                                </tr>
                                <tr>
                                    <th>Angsuran/Semester Ke</th>
                                    <td id="rekapAngsuranKe"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="confirm" value="" id="confirmCheckbox"
                                required>
                            <label class="form-check-label" for="confirmCheckbox">
                                <span class="text-success">
                                    Checklist untuk mengonfirmasi bahwa data transaksi sudah benar.
                                </span>
                            </label>
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
    <script src="{{ asset('assets/js/custom-trans-validation.js') }}"></script>
@endsection