<x-layout-presensi>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Yayasan Baitush Sholihin</h1>
        
        <div class="row g-4 justify-content-center">
            <a href="{{ route('kelola-guru') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="https://storage.googleapis.com/a1aa/image/6fOA5vjeEDlFq0n1fjvsw5F05BDypzqHSiaOIR30O1nyKLeOB.jpg" 
                            class="card-img-top rounded-4" alt="Illustration of students in a classroom">
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
                        <img src="https://storage.googleapis.com/a1aa/image/6fOA5vjeEDlFq0n1fjvsw5F05BDypzqHSiaOIR30O1nyKLeOB.jpg" 
                            class="card-img-top rounded-4" alt="Illustration of students in a classroom">
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
                        <img src="https://storage.googleapis.com/a1aa/image/6fOA5vjeEDlFq0n1fjvsw5F05BDypzqHSiaOIR30O1nyKLeOB.jpg" 
                            class="card-img-top rounded-4" alt="Illustration of students in a classroom">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">LAPORAN PRESENSI</h3>
                            <p class="card-text text-primary-custom">Periksa dan download laporan presensi</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </main>
</x-layout-presensi>