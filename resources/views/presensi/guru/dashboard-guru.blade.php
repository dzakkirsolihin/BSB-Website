<x-presensi-layout>
    <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Yayasan Baitush Sholihin</h1>

    <div class="row g-4 justify-content-center">
        <a href="{{ route('presensi-guru') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/presensi-guru.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Presensi Guru" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">PRESENSI GURU</h3>
                        <p class="card-text text-primary-custom">Lakukan Presensi Datang dan Pulang</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('riwayat-presensi-guru') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/riwayat-presensi.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Riwayat Presensi" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">RIWAYAT PRESENSI</h3>
                        <p class="card-text text-primary-custom">Lihat Rekam Jejak Kehadiran</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('dashboard-presensi-murid') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/presensi-murid.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Presensi Murid" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">PRESENSI MURID</h3>
                        <p class="card-text text-primary-custom">Pantau Presensi Harian Murid</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</x-presensi-layout>
