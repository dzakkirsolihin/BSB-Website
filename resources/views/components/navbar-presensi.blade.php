<nav class="bg-custom py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center">
                <a href="{{ route('dashboard-presensi') }}" class="text-decoration-none">
                    <x-application-logo alt="Logo of Baitush Sholihin Bandung" width="40" height="40" class="me-3" />
                    <span class="h4 mb-0 text-primary-custom fw-bold">Baitush Sholihin Bandung</span>
                </a>
            </div>
            <div class="col-md-6">
                <nav class="d-flex justify-content-end">
                    <a href="{{ route('dashboard-presensi') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Beranda</a>
                    <a href="{{ route('presensi-guru') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Presensi Guru</a>
                    <a href="{{ route('riwayat-presensi-guru') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Riwayat Presensi</a>
                    <a href="{{ route('dashboard-presensi-murid') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Presensi Murid</a>
                </nav>
            </div>
        </div>
    </div>
</nav>