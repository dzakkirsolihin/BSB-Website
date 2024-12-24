<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-custom">
    <div class="container-fluid">
        <div class="navbar-collapse justify-content-between align-items-center d-flex d-lg-justify-content-between gap-3">
            <div>
                <a href="{{ route('dashboard-admin') }}" class="navbar-brand d-flex align-items-center gap-2">
                    <x-application-logo alt="Logo of Baitush Sholihin Bandung" width="40" height="40" class="me-3" />
                    <span class="h4 mb-0 text-primary-custom fw-bold">Baitush Sholihin Bandung</span>
                </a>
            </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <x-nav-link-presensi :href="route('dashboard-admin')" :active="request()->routeIs('dashboard-admin')">Beranda</x-nav-link-presensi>
                        </li>
                        <li class="nav-item">
                            <x-nav-link-presensi :href="route('kelola-guru')" :active="request()->routeIs('kelola-guru')">Kelola Guru</x-nav-link-presensi>
                        </li>
                        <li class="nav-item">
                            <x-nav-link-presensi :href="route('kelola-kelas')" :active="request()->routeIs('kelola-kelas')">Kelola Kelas</x-nav-link-presensi>
                        </li>
                        <li class="nav-item">
                            <x-nav-link-presensi :href="route('kelola-laporan')" :active="request()->routeIs('kelola-laporan')">Laporan Presensi</x-nav-link-presensi>
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
        </div>
    </div>
</nav>
