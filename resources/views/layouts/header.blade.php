<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-between px-0" id="navbarNav">
            @if (Route::is('*.index'))
                <form class="d-flex" role="search" id="formkeyword">
                    <input style="width: 500px;" class="form-control me-2" type="text" name="keyword"
                        value="{{ request('keyword') }}" placeholder="Ctrl - / untuk mencari" aria-label="Search">
                    <a href="{{ request()->url() }}" class="btn btn-outline-primary">
                        {{-- <i class="ti ti-reload"></i> --}}
                        reset
                    </a>
                </form>
            @endif
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <div class="nav-item d-block pt-3">
                    <h5 style="margin-bottom: 0;">{{ Auth::user()->name }}</h5>
                    <p>{{ auth()->user()->roles->pluck('name')[0] ?? '' }}</p>
                </div>

                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('/') }}assets/images/profile/user-1.jpg" alt="" width="35"
                            height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="btn btn-outline-primary mx-3 mt-2 d-block" href="route('logout')"
                                    onclick="event.preventDefault();
                                this.closest('form').submit();">Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
