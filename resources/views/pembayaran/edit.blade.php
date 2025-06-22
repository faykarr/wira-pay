@extends('layouts.layout')

@section('title', 'Pengaturan Pembayaran')

@section('main-content')
    <div class="card shadow-none position-relative overflow-hidden mb-2">
        <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
            <h4 class="fw-semibold mb-0">Pengaturan Master Pembayaran</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('pembayaran.index') }}">Master Data
                            Pembayaran</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Pengaturan Master Pembayaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card shadow-none mb-4">
        <div class="card-body">
            <h4 class="card-title">Pengaturan master data pembayaran akademik - {{ $data->akademik->tahun_akademik }}</h4>
            <p class="card-subtitle mb-3"><span class="text-danger">Pastikan untuk mengatur master pembayaran dengan valid &
                    benar.</span></p>

            <form action="{{ route('pembayaran.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="mb-3 col-md-6">
                        <label for="registration_fee" class="form-label">Pembayaran Registrasi</label>
                        <div class="input-group">
                            <span class="input-group-text" id="registration_fee_rp" disabled>Rp</span>
                            <input type="text" class="form-control @error('registration_fee') is-invalid @enderror"
                                id="registration_fee" name="registration_fee" placeholder="3.000.000"
                                value="{{ old('registration_fee', $data->registration_fee) }}" required
                                aria-describedby="registration_fee_rp">
                        </div>
                        @error('registration_fee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="spi_fee" class="form-label">Pembayaran SPI</label>
                        <div class="input-group">
                            <span class="input-group-text" id="spi_fee_rp" disabled>Rp</span>
                            <input type="text" class="form-control @error('spi_fee') is-invalid @enderror" id="spi_fee"
                                name="spi_fee" placeholder="120.000" value="{{ old('spi_fee', $data->spi_fee) }}" required
                                aria-describedby="spi_fee_rp">
                        </div>
                        @error('spi_fee')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-send me-2 fs-4"></i>
                            Submit
                        </div>
                    </button>
                    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary rounded-pill px-4">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js-links')
    <script>
        $(document).ready(function () {
            // Format input as Rupiah currency
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? prefix + ' ' + rupiah : '');
            }

            function formatAllInputs() {
                $('#registration_fee, #spi_fee').each(function () {
                    var value = $(this).val();
                    var formatted = formatRupiah(value);
                    $(this).val(formatted);
                });
            }

            // Format on page load
            formatAllInputs();

            // Format on input
            $('#registration_fee, #spi_fee').on('input', function () {
                var value = $(this).val();
                var formatted = formatRupiah(value);
                $(this).val(formatted);
            });

            // Optional: Remove prefix before submit
            $('form').on('submit', function () {
                $('#registration_fee, #spi_fee').each(function () {
                    var val = $(this).val().replace(/[^,\d]/g, '');
                    $(this).val(val);
                });
            });
        });
    </script>
@endsection