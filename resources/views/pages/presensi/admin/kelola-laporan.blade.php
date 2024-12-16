<x-layout-admin>
    <h1 class="text-center inter-font text-primary-custom mb-5">Laporan Presensi Yayasan Baitush Sholihin</h1>
        
        <div class="row g-4 justify-content-center">
            <a href="{{ route('laporan-guru-daycare') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/riwayat-presensi.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of a teacher taking attendance in a classroom" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">GURU DAYCARE</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('laporan-guru-tk') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/guru-tk.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of a teacher checking attendance records" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">GURU TK</h3>
                            <p class="card-text text-primary-custom">Lihat rekam jejak kehadiran</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('laporan-daycare') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/daycare.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of students in a classroom" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">KELAS DAYCARE</h3>
                            <p class="card-text text-primary-custom">Pantau absensi siswa harian</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('laporan-tk-a') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-a.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of a teacher taking attendance in a classroom" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">KELAS TK A</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('laporan-tk-b') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-b.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of a teacher checking attendance records" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">KELAS TK B</h3>
                            <p class="card-text text-primary-custom">Lihat rekam jejak kehadiran</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('laporan-bestari') }}" class="col-md-4 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/bestari.jpg') }}" 
                            class="card-img-top rounded-top-4" alt="Illustration of students in a classroom" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">KELAS BESTARI</h3>
                            <p class="card-text text-primary-custom">Pantau absensi siswa harian</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
</x-layout-admin>