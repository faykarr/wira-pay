<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-center">
        <a href="{{ route('index') }}" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/logo-light.svg') }}" class="dark-logo" alt="Logo-Dark" />
            <img src="{{ asset('assets/images/logos/logo-dark.svg') }}" class="light-logo" alt="Logo-light" />
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>

    <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-0">

                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Beranda</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg" href="{{ route('dashboard') }}"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Dashboard</span>
                    </a>
                </li>

                <!-- ============================= -->
                <!-- Transaksi Pembayaran -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Transaksi Pembayaran</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow success-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-danger-subtle rounded-1">
                            <iconify-icon icon="solar:wallet-money-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Transaksi</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Transaksi Baru</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Riwayat Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- ============================= -->
                <!-- Master Data -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Master Data</span>
                </li>
                <!-- =================== -->
                <!-- Students -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow indigo-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-indigo-subtle rounded-1">
                            <iconify-icon icon="solar:calendar-date-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Akademik</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('akademik.index') }}" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Tahun Akademik</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('jurusan.index') }}" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Jurusan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- =================== -->
                <!-- Students -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow danger-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-danger-subtle rounded-1">
                            <iconify-icon icon="solar:square-academic-cap-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Siswa</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('siswa.index') }}" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Daftar Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('siswa.create') }}" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Siswa Baru</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- =================== -->
                <!-- Master Pembayaran -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link warning-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:hand-money-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Pembayaran</span>
                    </a>
                </li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>

    <div class="fixed-profile mx-3 mt-3">
        <a href="{{ route('index') }}">
            <div class="card bg-primary-subtle mb-0 shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('assets/images/profile/user-default.jpg') }}" width="45" height="45"
                                class="img-fluid rounded-circle" alt="" />
                            <div>
                                <h5 class="mb-1">Admin</h5>
                                <p class="mb-0">Tata Usaha</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
</aside>
<!--  Sidebar End -->