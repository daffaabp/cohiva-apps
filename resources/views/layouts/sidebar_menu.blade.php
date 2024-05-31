<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home_new') }}" class="text-nowrap logo-img">
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
                @hasanyrole('Superadmin|Admin|Konselor|Pasien')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Home</span>
                    </li>
                    @can('home_new')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('home_new') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                @hasanyrole('Admin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">LAPORAN</span>
                    </li>
                    @can('konselings.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('konselings*') && !request()->is('konselings/rekapkonseling') ? 'active' : '' }}" href="{{ route('konselings.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Laporan konseling</span>
                            </a>
                        </li>
                    @endcan
                    @can('konselings.rekapkonseling')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('konselings.rekapkonseling') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <span class="hide-menu">Rekap perbulan</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                @hasanyrole('Admin|Konselor')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">KONSELING</span>
                    </li>

                    @can('janji-konselings.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('janji-konseling*') ? 'active' : '' }}" href="{{ route('janji-konselings.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-clipboard"></i>
                                </span>
                                <span class="hide-menu">Janji Konseling</span>
                            </a>
                        </li>
                    @endcan

                    @can('konselings.konselingbykonselor')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('konselings*') ? 'active' : '' }}" href="{{ route('konselings.konselingbykonselor') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-comments">&#xeaef;</i>
                                </span>
                                <span class="hide-menu">Konseling by konselor</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                @can('jadwal-konselors.index')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">JADWAL</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link {{ request()->is('jadwal-konselors*') ? 'active' : '' }}" href="{{ route('jadwal-konselors.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Jadwal Konselor</span>
                        </a>
                    </li>
                @endcan

                @hasanyrole('Konselor')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">JANJI</span>
                    </li>
                    @can('janji-konselings.janjikonselor')
                        {{-- menu janji konseling by konselor --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('janji-konseling*') ? 'active' : '' }}" href="{{ route('janji-konselings.janjikonselor') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-clipboard"></i>
                                </span>
                                <span class="hide-menu">Janji Konselor</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                @hasanyrole('Admin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">MASTER</span>
                    </li>
                    @can('konselors.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('konselors*') ? 'active' : '' }}" href="{{ route('konselors.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Konselor</span>
                            </a>
                        </li>
                    @endcan

                    @can('pasiens.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('pasiens*') ? 'active' : '' }}" href="{{ route('pasiens.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-heart-broken"></i>
                                </span>
                                <span class="hide-menu">Pasien</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                @hasanyrole('Superadmin')
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">USERS MANAJEMEN</span>
                    </li>

                    @can('roles.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Role Managemen</span>
                            </a>
                        </li>
                    @endcan

                    @can('users.index')
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-id-badge"></i>
                                </span>
                                <span class="hide-menu">User Managemen</span>
                            </a>
                        </li>
                    @endcan
                @endhasanyrole

                <?php
                $id = Auth::user()->id;
                $pasien = App\Models\Pasien::where('id_user', $id)->first();

                ?>

                @isset($pasien)
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
                @endisset


            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
