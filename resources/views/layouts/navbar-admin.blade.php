<!-- navbar-admin.blade.php -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-custom">
    <div class="container-fluid">
        <a href="{{ route('dashboard-admin') }}" class="navbar-brand d-flex align-items-center gap-2">
            <x-application-logo alt="Logo of Baitush Sholihin Bandung" width="40" height="40" class="me-3" />
            <span class="h4 mb-0 text-primary-custom fw-bold">Baitush Sholihin Bandung</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <x-nav-link-presensi :href="route('dashboard-admin')" :active="request()->routeIs('dashboard-admin')">
                        Beranda
                    </x-nav-link-presensi>
                </li>
                <li class="nav-item">
                    <x-nav-link-presensi :href="route('kelola-guru')" :active="request()->routeIs('kelola-guru')">
                        Kelola Guru
                    </x-nav-link-presensi>
                </li>
                
                <!-- Dropdown Kelola Kelas -->
                <li class="nav-item dropdown">
                    <x-nav-link-presensi 
                        :href="route('kelola-kelas')"
                        :active="request()->routeIs(['kelola-kelas', 'kelola-kelas-daycare', 'kelola-kelas-tk-a', 'kelola-kelas-tk-b', 'kelola-kelas-bestari'])"
                    >
                        Kelola Kelas
                    </x-nav-link-presensi>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('kelola-kelas-daycare') }}">Kelola Kelas Daycare</a></li>
                        <li><a class="dropdown-item" href="{{ route('kelola-kelas-tk-a') }}">Kelola Kelas TK A</a></li>
                        <li><a class="dropdown-item" href="{{ route('kelola-kelas-tk-b') }}">Kelola Kelas TK B</a></li>
                        <li><a class="dropdown-item" href="{{ route('kelola-kelas-bestari') }}">Kelola Kelas Bestari</a></li>
                    </ul>
                </li>
    
                <!-- Dropdown Laporan Presensi -->
                <li class="nav-item dropdown">
                    <x-nav-link-presensi 
                        :href="route('kelola-laporan')"
                        :active="request()->routeIs(['kelola-laporan', 'laporan-guru-daycare', 'laporan-guru-tk', 'laporan-daycare', 'laporan-tk-a', 'laporan-tk-b', 'laporan-bestari'])"
                    >
                        Laporan Presensi
                    </x-nav-link-presensi>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('laporan-guru-daycare') }}">Laporan Guru Daycare</a></li>
                        <li><a class="dropdown-item" href="{{ route('laporan-guru-tk') }}">Laporan Guru TK</a></li>
                        <li><a class="dropdown-item" href="{{ route('laporan-daycare') }}">Laporan Daycare</a></li>
                        <li><a class="dropdown-item" href="{{ route('laporan-tk-a') }}">Laporan TK A</a></li>
                        <li><a class="dropdown-item" href="{{ route('laporan-tk-b') }}">Laporan TK B</a></li>
                        <li><a class="dropdown-item" href="{{ route('laporan-bestari') }}">Laporan Bestari</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dashboard-guru') }}" class="btn btn-primary-custom text-white fw-bold mx-2">Guru</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger text-white fw-bold mx-2">Keluar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Style untuk dropdown */
    .nav-item.dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: 0.5rem 0;
        margin: 0;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,.15);
        border-radius: 0.25rem;
    }

    /* Memunculkan dropdown hanya saat hover */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    /* Style untuk dropdown items */
    .dropdown-item {
        display: block;
        width: 100%;
        padding: 0.5rem 1rem;
        clear: both;
        font-weight: 500;
        color: #212529;
        text-align: inherit;
        text-decoration: none;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    .dropdown-item:hover {
        color: #1e2125;
        background-color: #e9ecef;
    }
</style>