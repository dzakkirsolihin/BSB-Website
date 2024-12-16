<x-admin-layout>
    <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Yayasan Baitush Sholihin</h1>

    <div class="row g-4 justify-content-center">
        <a href="{{ route('kelola-guru') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/presensi-guru.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Presensi Guru" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">KELOLA AKUN GURU</h3>
                        <p class="card-text text-primary-custom">Daftarkan atau hapus akun guru</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('kelola-kelas') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/presensi-murid.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Riwayat Presensi" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">KELOLA KELAS</h3>
                        <p class="card-text text-primary-custom">Tambahkan atau hapus daftar murid</p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('kelola-laporan') }}" class="col-md-4 text-decoration-none">
            <div>
                <div class="card h-100 shadow-sm rounded-4">
                    <img src="{{ asset('Assets/presensi/riwayat-presensi.jpg') }}"
                        class="card-img-top rounded-top-4 img-fluid" alt="Presensi Murid" style="height: 300px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h3 class="card-title text-primary-custom">LAPORAN PRESENSI</h3>
                        <p class="card-text text-primary-custom">Periksa dan download laporan presensi</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</x-admin-layout>
