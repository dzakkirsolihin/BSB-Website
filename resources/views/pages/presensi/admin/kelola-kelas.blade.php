<x-layout-admin>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Murid dalam Kelas</h1>
        
        <div class="row g-4 justify-content-center">
            <a href="kelola-kelas-daycare" class="col-md-3 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/daycare.jpg') }}" 
                            class="card-img-top rounded-4" alt="foto murid Daycare" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">DAYCARE</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </div>
            </a>

            <a href="kelola-kelas-tk-a" class="col-md-3 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-a.jpg') }}"
                            class="card-img-top rounded-4" alt="foto murid TK A" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center"></div>
                            <h3 class="card-title text-primary-custom">TK A</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="kelola-kelas-tk-b" class="col-md-3 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-b.jpg') }}" 
                            class="card-img-top rounded-4" alt="foto murid TK B" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">TK B</h3>
                            <p class="card-text text-primary-custom">Lihat rekam jejak kehadiran</p>
                        </div>
                    </div>
                </div>
            </a>
            
            <a href="kelola-kelas-bestari" class="col-md-3 text-decoration-none">
                <div>
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/bestari.jpg') }}" 
                            class="card-img-top rounded-4" alt="foto murid Bestari" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">BESTARI</h3>
                            <p class="card-text text-primary-custom">Pantau absensi siswa harian</p>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>
    </main>
</x-layout-admin>