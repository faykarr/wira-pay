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
                            <p class="fs-3 mb-3 pb-1">Check all the statastics</p>
                            <button class="btn btn-primary rounded-pill" type="button">
                                Visit Now
                            </button>
                        </div>
                        <div class="school-img d-none d-sm-block">
                            <img src="../assets/images/backgrounds/school.png" class="img-fluid" alt="" />
                        </div>

                        <div class="d-sm-none d-block text-center">
                            <img src="../assets/images/backgrounds/school.png" class="img-fluid" alt="" />
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
                                    2358 <span class="fs-2 fw-light">+23%</span>
                                </h5>
                                <p class="opacity-50 mb-0 ">Sales</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 d-flex align-items-strech">
                        <div class="card danger-card overflow-hidden text-bg-primary w-100">
                            <div class="card-body p-4">
                                <div class="mb-7">
                                    <i class="ti ti-report-money fs-8 fw-lighter"></i>
                                </div>
                                <h5 class="text-white fw-bold fs-14">
                                    356 <span class="fs-2 fw-light">+8%</span>
                                </h5>
                                <p class="opacity-50 mb-0">Refunds</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 d-flex align-items-strech">
                        <div class="card info-card overflow-hidden text-bg-primary w-100">
                            <div class="card-body p-4">
                                <div class="mb-7">
                                    <i class="ti ti-currency-dollar fs-8 fw-lighter"></i>
                                </div>
                                <h5 class="text-white fw-bold fs-14 text-nowrap">
                                    $235.8K <span class="fs-2 fw-light">-3%</span>
                                </h5>
                                <p class="opacity-50 mb-0">Earnings</p>
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
                            <h5 class="mb-0 fw-bold">Profit & Expenses</h5>

                            <div class="dropdown">
                                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-7 d-flex flex-column">
                                <div id="profit" class="profit-chart"></div>
                            </div>

                            <div class="col-md-5">
                                <div>
                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-danger-subtle rounded-3 me-4">
                                            <img src="../assets/images/svgs/biology-1584993.svg" width="24" height="24"
                                                alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">$63,489.50</h5>
                                            <p class="fs-3 mb-0">Earning this year</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-primary-subtle rounded-3 me-4">
                                            <img src="../assets/images/svgs/erase-1585028.svg" width="24" height="24"
                                                alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">
                                                $48,820.00
                                                <span class="fs-2 fw-light text-success">+23%</span>
                                            </h5>
                                            <p class="fs-3 mb-0">Profit this year</p>
                                        </div>
                                    </div>

                                    <div class="d-flex mb-4 pb-3">
                                        <div class="p-2 bg-secondary-subtle rounded-3 me-4">
                                            <img src="../assets/images/svgs/globe-1584990.svg" width="24" height="24"
                                                alt="" />
                                        </div>

                                        <div>
                                            <h5 class="fs-5 mb-0 fw-bold">$103,582.50</h5>
                                            <p class="fs-3 mb-0">Overall earnings</p>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-primary rounded-pill">
                                            View Full Report
                                        </button>
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
                            <h5 class="mb-0 fw-bold">Product Sales</h5>

                            <div class="dropdown">
                                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div id="test"></div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-3 bg-primary-subtle me-7 round-40 d-flex align-items-center justify-content-center">
                                <img src="../assets/images/svgs/icon-user.svg" alt="" class="img-fluid">
                            </div>
                            <div>
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 fs-4">36,436</h5>
                                    <span
                                        class="badge rounded-pill bg-success-subtle text-success border-success border ms-1">+12%</span>
                                </div>
                                <p class="mb-0">New Customer</p>
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
                            <h5 class="mb-0 fw-bold">Traffic Distribution</h5>

                            <div class="dropdown">
                                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
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
                                            <p class="fs-5 fw-bold mb-0 text-dark">4,106 <span
                                                    class="fs-2 fw-light text-success">+23%</span></p>
                                            <p class="fs-3 mb-0">Oragnic Traffic</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline mb-4">
                                        <div>
                                            <i class="ti ti-circle text-danger me-2 fs-5"></i>
                                        </div>

                                        <div>
                                            <p class="fs-5 fw-bold mb-0 text-dark">3,500</p>
                                            <p class="fs-3 mb-0">Refferal Traffic</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                        <div>
                                            <i class="ti ti-circle text-warning me-2 fs-5"></i>
                                        </div>

                                        <div>
                                            <p class="fs-5 fw-bold mb-0 text-dark">3,319</p>
                                            <p class="fs-3 mb-0">Direct Traffic</p>
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
                                        <img src="../assets/images/svgs/idea-1585024.svg" width="24" height="24" alt="" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="fs-4 mb-0 fw-bold">New Goals</h5>
                                    <p class="text-primary fw-normal fs-3 mb-0">83%</p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary rounded" style="width: 75%" role="progressbar"
                                        aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <img src="../assets/images/profile/user-3.jpg" class="rounded-circle" alt="" width="60"
                                        height="60" />
                                    <p class="text-warning fw-bold fs-3 mb-0">
                                        #1 in DevOps
                                    </p>
                                </div>

                                <h5 class="mb-1">Adam Johnson</h5>
                                <p class="fs-3 mb-0">Top Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card mb-0 bg-danger-subtle gift-card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../assets/images/backgrounds/gifts.png" class="img-fluid" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="figma-card mb-0">
                                <div class="card-body">
                                    <a href="" class="fs-4 link-dark fw-bold">
                                        Figma Tips and Tricks with Stephan
                                    </a>
                                    <p class="fs-3 mt-2">
                                        Checkout latest events going to happen in USA.
                                    </p>

                                    <ul class="d-flex align-items-center mb-0">
                                        <li>
                                            <a href="javascript:void(0)" class="me-1">
                                                <img src="../assets/images/profile/user-4.jpg" width="32" height="32"
                                                    class="rounded-circle" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="me-1">
                                                <img src="../assets/images/profile/user-5.jpg" width="32" height="32"
                                                    class="rounded-circle" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="me-1">
                                                <img src="../assets/images/profile/user-3.jpg" width="32" height="32"
                                                    class="rounded-circle" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="me-1">
                                                <img src="../assets/images/profile/user-2.jpg" width="32" height="32"
                                                    class="rounded-circle" alt="" />
                                            </a>
                                        </li>
                                        <li class="align-middle d-flex">
                                            <a href="javascript:void(0)" class="link-secondary me-1 px-2">
                                                <p class="mb-0">+18</p>
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
            <div class="col-lg-12 col-xl-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Top Employees</h5>

                            <div class="dropdown">
                                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive" data-simplebar>
                            <table class="table table-borderless align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Hour Rate</th>
                                        <th scope="col">Skills</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-4">
                                                    <img src="../assets/images/profile/user-2.jpg" width="50"
                                                        class="rounded-circle" alt="" />
                                                </div>

                                                <div>
                                                    <h6 class="mb-1 fw-bolder">Mark J. Freeman</h6>
                                                    <p class="fs-3 mb-0">Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fs-3 fw-normal mb-0">$80/hour</p>
                                        </td>
                                        <td>
                                            <p class="fs-3 mb-0">
                                                HTML
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-success-subtle rounded-pill text-success border-success border fs-2">Available</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-4">
                                                    <img src="../assets/images/profile/user-3.jpg" width="50"
                                                        class="rounded-circle" alt="" />
                                                </div>

                                                <div>
                                                    <h6 class="mb-1 fw-bolder">Nina R. Oldman</h6>
                                                    <p class="fs-3 mb-0">Designer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fs-3 fw-normal mb-0">$70/hour</p>
                                        </td>
                                        <td>
                                            <p class="fs-3 mb-0">
                                                JavaScript
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-primary-subtle rounded-pill text-primary border-primary border fs-2">On
                                                Holiday</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-4">
                                                    <img src="../assets/images/profile/user-4.jpg" width="50"
                                                        class="rounded-circle" alt="" />
                                                </div>

                                                <div>
                                                    <h6 class="mb-1 fw-bolder">Arya H. Shah</h6>
                                                    <p class="fs-3 mb-0">Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fs-3 fw-normal mb-0">$40/hour</p>
                                        </td>
                                        <td>
                                            <p class="fs-3 mb-0">
                                                React
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-danger-subtle rounded-pill text-danger border border-danger fs-2">Absent</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-4">
                                                    <img src="../assets/images/profile/user-5.jpg" width="50"
                                                        class="rounded-circle" alt="" />
                                                </div>

                                                <div>
                                                    <h6 class="mb-1 fw-bolder">June R. Smith</h6>
                                                    <p class="fs-3 mb-0">Designer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fs-3 fw-normal mb-0">$20/hour</p>
                                        </td>
                                        <td>
                                            <p class="fs-3 mb-0">
                                                Vuejs
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-warning-subtle rounded-pill text-warning border border-warning fs-2">On
                                                Leave</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="me-4">
                                                    <img src="../assets/images/profile/user-6.jpg" width="50"
                                                        class="rounded-circle" alt="" />
                                                </div>

                                                <div>
                                                    <h6 class="mb-1 fw-bolder">Mark J. Freeman</h6>
                                                    <p class="fs-3 mb-0">Developer</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fs-3 fw-normal mb-0">$65/hour</p>
                                        </td>
                                        <td>
                                            <p class="fs-3 mb-0">
                                                Angular
                                            </p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-indigo-subtle rounded-pill text-indigo border border-indigo fs-2">Available</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-4 d-flex align-items-stretch">
                <div class="card acedamic w-100">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Upcoming Scheduls</h5>

                            <div class="dropdown">
                                <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                    <i class="ti ti-dots-vertical fs-7 d-block"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs shadow justify-content-between" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link me-1 active w-100" data-bs-toggle="tab" href="#one" role="tab">
                                    <span>1 to 3</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-1" data-bs-toggle="tab" href="#two" role="tab">
                                    <span>4 to 7</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-1" data-bs-toggle="tab" href="#three" role="tab">
                                    <span>8 to 10</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="one" role="tabpanel">
                                <div class="tab-content" data-simplebar>
                                    <div class="row mt-4 gx-0">
                                        <div class="col-2">
                                            <ul>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">13:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-0">13:30</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-10">
                                            <div class="acedamic-box h-100">
                                                <div class="pt-3 px-1">
                                                    <div class="acedamic-card mt-4 card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Marketing Meeting
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">08:30 - 10:00</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="acedamic-card border-success card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Applied mathematics
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">10:15 - 11:45</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="acedamic-card border-danger card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            SEO Session with Team
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">12:00 - 13:25</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
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

                            <div class="tab-pane" id="two" role="tabpanel">
                                <div class="tab-content" data-simplebar>
                                    <div class="row gx-0 mt-4">
                                        <div class="col-2">
                                            <ul>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">13:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-0">13:30</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-10">
                                            <div class="acedamic-box h-100">
                                                <div class="pt-3 px-1">
                                                    <div class="acedamic-card mt-4 card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Marketing Meeting
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">08:30 - 10:00</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="acedamic-card border-primary card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Applied mathematics
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">10:15 - 11:45</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="acedamic-card border-success card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            SEO Session with Team
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">12:00 - 13:25</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
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

                            <div class="tab-pane" id="three" role="tabpanel">
                                <div class="tab-content" data-simplebar>
                                    <div class="row gx-0 mt-4">
                                        <div class="col-2">
                                            <ul>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">8:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">9:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">10:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">11:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">12:30</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-4 pb-2">13:00</p>
                                                </li>
                                                <li>
                                                    <p class="fs-3 mb-0">13:30</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-10">
                                            <div class="acedamic-box h-100">
                                                <div class="pt-3 px-1">
                                                    <div class="acedamic-card mt-4 card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Marketing Meeting
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">08:30 - 10:00</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div
                                                        class="acedamic-card border-secondary card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            Applied mathematics
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">10:15 - 11:45</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="acedamic-card border-info card rounded-1 p-3 shadow-sm">
                                                        <h6 class="fw-bold fs-4">
                                                            SEO Session with Team
                                                        </h6>
                                                        <div class="d-flex align-items-center fw-normal mb-5">
                                                            <i class="ti ti-clock-hour-4 fs-5 me-1"></i>
                                                            <p class="mb-0 fs-3">12:00 - 13:25</p>
                                                        </div>
                                                        <ul class="d-flex align-items-center mb-0">
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-5.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-3.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-n1">
                                                                    <img src="../assets/images/profile/user-4.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" class="me-1">
                                                                    <img src="../assets/images/profile/user-2.jpg"
                                                                        width="32" height="32" alt=""
                                                                        class="rounded-circle" />
                                                                </a>
                                                            </li>
                                                            <li class="align-middle d-flex">
                                                                <a href="javascript:void(0)" class="link-secondary px-2">
                                                                    <p class="mb-0">+18</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
    {{-- Charts & Pages Script --}}
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/js/dashboards/dashboard2.js"></script>
@endsection