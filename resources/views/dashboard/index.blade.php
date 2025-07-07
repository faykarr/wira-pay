@extends('layouts.layout')

@section('title', 'Dashboard')
@section('main-content')
    <section class="welcome">
        <div class="row">
            <div class="col-lg-12 col-xl-6 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body position-relative">
                        <div>
                            <h5 class="mb-1 fw-bold">Welcome Admin Wira Bahari!</h5>
                            <p class="fs-3 mb-3 pb-1">Klik tombol dibawah, cara cepat <br> membuat transaksi baru.</p>
                            <a href="{{ route('payments.create') }}" class="btn btn-primary rounded-pill">
                                <i class="ti ti-currency-dollar fs-5"></i>
                                Transaksi Baru
                            </a>
                        </div>
                        <div class="school-img d-none d-sm-block">
                            <img src="{{ asset('assets/images/backgrounds/school.png') }}" class="img-fluid" alt="" />
                        </div>

                        <div class="d-sm-none d-block text-center">
                            <img src="{{ asset('assets/images/backgrounds/school.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-6">
                <div class="row">
                    <div class="col-sm-4 d-flex align-items-strech">
                        <div class="card warning-card overflow-hidden text-bg-primary w-100">
                            <div class="card-body p-4">
                                <div class="mb-7">
                                    <i class="ti ti-brand-producthunt fs-8 fw-lighter"></i>
                                </div>
                                <h5 class="text-white fw-bold fs-14 text-nowrap">
                                    {{ $data['siswa_belum_lunas'] }} <span class="fs-2 fw-light">Siswa</span>
                                </h5>
                                <p class="opacity-50 mb-0 ">Siswa Belum Lunas</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 d-flex align-items-strech">
                        <div class="card danger-card overflow-hidden text-bg-primary w-100">
                            <div class="card-body p-4">
                                <div class="mb-7">
                                    <i class="ti ti-report-money fs-8 fw-lighter"></i>
                                </div>
                                <h5 class="text-white fw-bold fs-14 rupiah-singkat"
                                    data-value="{{ $data['total_pembayaran']->total_spi ?? 0 }}">
                                    Rp {{ $data['total_pembayaran']->total_spi ?? 0 }}
                                </h5>
                                <p class="opacity-50 mb-0">Total SPI TA {{ $data['current_akademik'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 d-flex align-items-strech">
                        <div class="card info-card overflow-hidden text-bg-primary w-100">
                            <div class="card-body p-4">
                                <div class="mb-7">
                                    <i class="ti ti-currency-dollar fs-8 fw-lighter"></i>
                                </div>
                                <h5 class="text-white fw-bold fs-14 rupiah-singkat"
                                    data-value="{{ $data['total_pembayaran']->total_registration ?? 0 }}">
                                    Rp {{ $data['total_pembayaran']->total_registration ?? 0 }}
                                </h5>
                                <p class="opacity-50 mb-0">Total Registrasi TA {{ $data['current_akademik'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Section End -->

    <!-- Profit Section Start -->
    <section>
        <div class="row">
            <div class="col-lg-12 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Grafik Pemasukan Tahun Akademik {{ $data['current_akademik'] }}</h5>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-7 d-flex flex-column">
                                <div id="profit" class="profit-chart"></div>
                            </div>

                            <div class="col-md-5 justify-content-center d-flex">
                                <div>
                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-danger-subtle rounded-3 me-4">
                                            <img src="{{ asset('assets/images/svgs/biology-1584993.svg') }}" width="24"
                                                height="24" alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">Rp
                                                {{ number_format($data['total_pembayaran']->total_registration, 0, ',', '.') }}
                                            </h5>
                                            <p class="fs-3 mb-0">Pemasukan Registrasi</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-primary-subtle rounded-3 me-4">
                                            <img src="{{ asset('assets/images/svgs/erase-1585028.svg') }}" width="24"
                                                height="24" alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">
                                                Rp
                                                {{ number_format($data['total_pembayaran']->total_spi, 0, ',', '.') }}
                                            </h5>
                                            <p class="fs-3 mb-0">Pemasukan SPI</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-warning-subtle rounded-3 me-4">
                                            <img src="{{ asset('assets/images/svgs/globe-1584990.svg') }}" width="24"
                                                height="24" alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">Rp
                                                {{ number_format(($data['total_pembayaran']->total_registration + $data['total_pembayaran']->total_spi), 0, ',', '.') }}
                                            </h5>
                                            <p class="fs-3 mb-0">Semua Pemasukan</p>
                                        </div>
                                    </div>

                                    <div>
                                        <a href="{{ route('payments.index') }}" class="btn btn-primary rounded-pill">
                                            Lihat Riwayat Transaksi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-4 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Pemasukan Per Tahun Akademik</h5>
                        </div>
                        <div>
                            <div id="test"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-3 bg-primary-subtle me-7 round-40 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/images/svgs/icon-user.svg') }}" alt="Icon User"
                                    class="img-fluid">
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 fs-4">{{ $data['count_transactions'] }} Transaksi</h5>
                                </div>
                                <p class="mb-0">Total Transaksi TA {{ $data['current_akademik'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profit Section End -->

    <!-- Grades Start -->
    <section>
        <div class="row">
            <div class="col-lg-12 col-xl-6 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Grafik Pembayaran Siswa - Tahun Akademik
                                {{ $data['current_akademik'] }}
                            </h5>
                        </div>
                        <div class="d-flex align-items-center mt-5">
                            <div class="d-sm-flex d-block align-items-center justify-content-center">
                                <div id="grade"></div>

                                <div class="ms-xxl-4">
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div>
                                            <i class="ti ti-circle text-primary me-2 fs-5"></i>
                                        </div>

                                        <div>
                                            <p class="fs-5 fw-bold mb-0 text-dark">{{ $data['count_siswa']['lunas'] }} Siswa
                                            </p>
                                            <p class="fs-3 mb-0">Sudah Lunas <br> Registrasi & SPI</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div>
                                            <i class="ti ti-circle text-danger me-2 fs-5"></i>
                                        </div>

                                        <div>
                                            <p class="fs-5 fw-bold mb-0 text-dark">{{ $data['count_siswa']['belum_lunas'] }}
                                                Siswa</p>
                                            <p class="fs-3 mb-0">Belum Lunas <br> Registrasi / SPI</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div>
                                            <i class="ti ti-circle text-success me-2 fs-5"></i>
                                        </div>

                                        <div>
                                            <p class="fs-5 fw-bold mb-0 text-dark">{{ $data['count_siswa']['total_siswa'] }}
                                                Siswa</p>
                                            <p class="fs-3 mb-0">Total Siswa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card info-card bg-primary-subtle w-100 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex mb-7">
                                    <div class="p-6 bg-info shadow-info rounded-3 me-3">
                                        <img src="{{ asset('assets/images/svgs/idea-1585024.svg') }}" width="24" height="24"
                                            alt="Idea Icon" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="fs-4 mb-0 fw-bold">Persentase</h5>
                                    <p class="text-primary fw-normal fs-3 mb-0">
                                        {{ $data['persentase_lunas']['persentase'] }}% Lunas
                                    </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary rounded"
                                        style="width: {{ $data['persentase_lunas']['persentase'] ?? 0 }}%"
                                        role="progressbar"
                                        aria-valuenow="{{ $data['persentase_lunas']['persentase'] ?? 0 }}" aria-valuemin="0"
                                        aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="fs-2 mb-0 fw-bolder">{{ $data['persentase_lunas']['jumlah_lunas'] }} dari
                                        {{ $data['persentase_lunas']['total_siswa'] }} Siswa Aktif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="rounded-circle" alt=""
                                        width="60" height="60" />
                                    <a href="https://wa.me/6288806923500" target="_blank">
                                        <p class="text-warning fw-bold fs-3 mb-0">
                                            # Contact Me
                                        </p>
                                    </a>
                                </div>

                                <h5 class="mb-1">Nasyath Faykar</h5>
                                <p class="fs-3 mb-0">Developer App</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card mb-0 bg-danger-subtle gift-card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/images/backgrounds/gifts-2.png') }}" height="132"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="figma-card mb-0">
                                <div class="card-body">
                                    <p class="fs-4 fw-bold">
                                        Developed by <br>
                                        <span class="text-primary">Nasyath Faykar</span>
                                    </p>
                                    <p class="fs-3 mt-2">
                                        Checkout latest projects at my LinkedIn.
                                    </p>

                                    <ul class="d-flex align-items-center mb-0">
                                        <li>
                                            <a href="https://www.linkedin.com/in/nasyath-faykar/" class="me-1"
                                                target="_blank">
                                                <img src="{{ asset('assets/images/logos/linkedin-logo.png') }}" height="32"
                                                    alt="Linkedin Logo" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Grades End -->

    <!-- Educators Start -->
    <section>
        <div class="row">
            <div class="col-lg-12 col-xl-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Riwayat Pembayaran Terakhir</h5>

                            {{-- Add button to show all employees --}}
                            <a href="{{ route('payments.index') }}">
                                <button class="btn btn-primary rounded-pill">
                                    Show All
                                </button>
                            </a>
                        </div>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-borderless align-middle text-nowrap">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Siswa</th>
                                        <th scope="col">Tahun Akademik</th>
                                        <th scope="col">Jenis Pembayaran</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Waktu Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($data['latest_transactions'] as $row)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <h6 class="mb-1 fw-bolder">
                                                            {{ ucwords(strtolower($row->siswa->nama_lengkap)) }}
                                                        </h6>
                                                        <p class="fs-3 mb-0">{{ $row->siswa->nit }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fs-3 fw-normal mb-0">{{ $row->siswa->akademik->tahun_akademik }}</p>
                                            </td>
                                            <td>
                                                @if ($row->jenis_pembayaran == 'Registrasi')
                                                    <span
                                                        class="badge bg-danger-subtle rounded-pill text-danger border-danger border fs-2">
                                                        Pembayaran Registrasi
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-warning-subtle rounded-pill text-warning border-warning border fs-2">
                                                        Pembayaran SPI
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">
                                                    Rp {{ number_format($row->nominal, 0, ',', '.') }}
                                                </span>
                                            </td>
                                            <td>
                                                <p class="fs-3 mb-0">
                                                    <span
                                                        class="badge bg-primary-subtle rounded-pill text-primary border-primary border fs-2">
                                                        {{ Carbon\Carbon::parse($row->tanggal_transaksi)->locale('id')->isoFormat('D MMMM Y') }}
                                                    </span>
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
    {{-- Charts & Pages Script --}}
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script>
        const pemasukanTahunan = @json($data['pemasukan_tahun']);
        const pemasukanBulanan = @json($data['pemasukan_bulan']);
        const persentaseSiswa = @json($data['persentase_siswa']);
    </script>
    <script src="{{ asset('assets/js/dashboards/dashboard2.js') }}"></script>
@endsection