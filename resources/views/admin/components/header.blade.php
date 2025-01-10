<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <a href="/"><img src="../images/logo.png" alt="Your Logo" class="h-12 w-auto mr-6"></a>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Otomotif</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="/admin/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text"> Resource</span></li>
        <li class="menu-item {{ request()->is('admin/siswa') ? 'active' : '' }}">
            <a href="/admin/siswa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Tables">Siswa</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/pendaftaran') ? 'active' : '' }}">
            <a href="/admin/pendaftaran" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Tables">Pendaftaran</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text"> Package</span></li>
        <li class="menu-item {{ request()->is('admin/paket') ? 'active' : '' }}">
            <a href="/admin/paket" class="menu-link">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Tables">Paket</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text"> Schedule</span></li>
        <li class="menu-item {{ request()->is('admin/jadwal') ? 'active' : '' }}">
            <a href="/admin/jadwal" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Tables">Jadwal</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/absensi') ? 'active' : '' }}">
            <a href="/admin/absensi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-check"></i>
                <div data-i18n="Tables">Absensi</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text"> Management</span></li>
        <li class="menu-item {{ request()->is('admin/user') ? 'active' : '' }}">
            <a href="/admin/user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Tables">User</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->

    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" id="searchInput" class="form-control border-0 shadow-none" placeholder="Cari..."
                        aria-label="Search..." autocomplete="off"/>
                    <div id="searchResults" class="dropdown-menu" style="display: none; position: absolute; top: 100%; width: 100%;">
                        <a href="/admin/siswa" class="dropdown-item search-item" data-table="siswa">
                            <i class="bx bx-user me-2"></i>Data Siswa
                        </a>
                        <a href="/admin/pendaftaran" class="dropdown-item search-item" data-table="pendaftaran">
                            <i class="bx bx-file me-2"></i>Data Pendaftaran
                        </a>
                        <a href="/admin/paket" class="dropdown-item search-item" data-table="paket">
                            <i class="bx bx-package me-2"></i>Data Paket
                        </a>
                        <a href="/admin/jadwal" class="dropdown-item search-item" data-table="jadwal">
                            <i class="bx bx-calendar me-2"></i>Data Jadwal
                        </a>
                        <a href="/admin/absensi" class="dropdown-item search-item" data-table="absensi">
                            <i class="bx bx-calendar-check me-2"></i>Data Absensi
                        </a>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('searchInput');
                    const searchResults = document.getElementById('searchResults');
                    const searchItems = document.querySelectorAll('.search-item');

                    searchInput.addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        
                        if (searchTerm.length > 0) {
                            searchResults.style.display = 'block';
                            searchItems.forEach(item => {
                                const text = item.textContent.toLowerCase();
                                if (text.includes(searchTerm)) {
                                    item.style.display = 'block';
                                } else {
                                    item.style.display = 'none';
                                }
                            });
                        } else {
                            searchResults.style.display = 'none';
                        }
                    });

                    document.addEventListener('click', function(e) {
                        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                            searchResults.style.display = 'none';
                        }
                    });
                });
            </script>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="../assets/img/avatars/1.png" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Profil Saya</span>
                            </a>
                        </li>
                        
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Keluar</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>

    <!-- / Navbar -->
