<!-- Sidebar Start -->
<aside class="left-sidebar with-vertical">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-center">
        <a href="../dark/index.html" class="text-nowrap logo-img">
            <img src="../assets/images/logos/logo-light.svg" class="dark-logo" alt="Logo-Dark" />
            <img src="../assets/images/logos/logo-dark.svg" class="light-logo" alt="Logo-light" />
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
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg active" href="{{ route('index') }}"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Dashboard</span>
                    </a>
                </li>

                <!-- ============================= -->
                <!-- SchoolPages -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">SchoolPages</span>
                </li>

                <!-- =================== -->
                <!-- Teachers -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow success-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-success-subtle rounded-1">
                            <iconify-icon icon="solar:lightbulb-bolt-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Teachers</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../dark/all-teacher.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">All Teachers</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/teacher-details.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu"> Teachers Details</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- =================== -->
                <!-- Exam -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow warning-hover-bg" href="#" aria-expanded="false">
                        <span class="aside-icon p-2 bg-warning-subtle rounded-1">
                            <iconify-icon icon="solar:file-text-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Exam</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../dark/exam-schedule.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">Exam Schedule</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/exam-result.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu"> Exam Result</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/exam-result-details.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu"> Exam Result Details</span>
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
                        <span class="hide-menu ps-1">Students</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="../dark/all-student.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu">All Students</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../dark/student-details.html" class="sidebar-link">
                                <span class="sidebar-icon"></span>
                                <span class="hide-menu"> Students Details</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- =================== -->
                <!-- Classes -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link indigo-hover-bg my-3" href="../dark/classes.html"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-indigo-subtle rounded-1">
                            <iconify-icon icon="solar:planet-3-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Classes</span>
                    </a>
                </li>

                <!-- =================== -->
                <!-- Attendance -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link info-hover-bg" href="../dark/attendance.html"
                        aria-expanded="false">
                        <span class="aside-icon p-2 bg-info-subtle rounded-1">
                            <iconify-icon icon="solar:file-check-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Attendance</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>

    <div class="fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="../assets/images/profile/user-default.jpg" width="45" height="45"
                            class="img-fluid rounded-circle" alt="" />
                        <div>
                            <h5 class="mb-1">Admin</h5>
                            <p class="mb-0">Tata Usaha</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
</aside>
<!--  Sidebar End -->