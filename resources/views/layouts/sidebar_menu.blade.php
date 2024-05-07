<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ URL::to('/assets/images/logos/cohiva-logo.svg') }}" width="180" style="margin-left: 15px"
                    alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./index.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">LAPORAN</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Laporan konseling</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Rekap perbulan</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">KONSELING</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('konselings.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-comments">&#xeaef;</i>
                        </span>
                        <span class="hide-menu">Konseling</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">JADWAL</span>
                </li>

                @can('jadwal-konselors.index')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('jadwal-konselors.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Jadwal Konselor</span>
                        </a>
                    </li>
                @endcan

                @can('janji-konselings.index')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('janji-konselings.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-clipboard"></i>
                            </span>
                            <span class="hide-menu">Janji Konseling</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MASTER</span>
                </li>
                @can('konselors.index')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('konselors.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-cards"></i>
                            </span>
                            <span class="hide-menu">Konselor</span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pasiens.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-heart-broken"></i>
                        </span>
                        <span class="hide-menu">Pasien</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="btn sidebar-link" data-toggle="collapse" aria-expanded="false"
                        onclick="toggleUserDropdown()">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Users management</span>
                        <span class="menu-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <ul id="userDropdown" class="collapse list-unstyled">
                        @can('roles.index')
                            <li class="sidebar-item sub-menu">
                                <a class="sidebar-link" href="{{ route('roles.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-cards"></i>
                                    </span>
                                    <span class="hide-menu">Role Managemen</span>
                                </a>
                            </li>
                        @endcan

                        @can('users.index')
                            <li class="sidebar-item sub-menu">
                                <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-id-badge"></i>
                                    </span>
                                    <span class="hide-menu">User Managemen</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                @canany(['info_hiv', 'daftar_konselor', 'jadwalkan_konseling'])
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">PASIEN</span>
                    </li>
                @endcanany()

                @can('info_hiv')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('info_hiv') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-heart-broken"></i>
                            </span>
                            <span class="hide-menu">Info lengkap HIV AIDS</span>
                        </a>
                    </li>
                @endcan

                @can('daftar_konselor')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('daftar_konselor') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-plus"></i>
                            </span>
                            <span class="hide-menu">Daftar konselor</span>
                        </a>
                    </li>
                @endcan

                @can('jadwalkan_konseling')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('jadwalkan_konseling') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-mood-happy"></i>
                            </span>
                            <span class="hide-menu">Jadwalkan konseling</span>
                        </a>
                    </li>
                @endcan
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<style>
    #userDropdown {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s linear;
    }

    #userDropdown.show {
        max-height: 200px;
    }

    .menu-arrow {
        margin-left: auto;
        margin-right: 10px;
    }

    .sub-menu {
        padding-left: 20px;
    }
</style>

<script>
    function toggleUserDropdown() {
        var userDropdown = document.getElementById("userDropdown");
        userDropdown.classList.toggle("show");


        var menuArrow = document.querySelector(
            ".sidebar-item .menu-arrow i"); // Perbarui selektor untuk mengambil ikon FontAwesome
        menuArrow.classList.toggle("fa-chevron-down");
        menuArrow.classList.toggle("fa-chevron-up");

    }
</script>
