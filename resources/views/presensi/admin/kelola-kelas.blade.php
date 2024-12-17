<x-layout-admin>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Siswa dalam Kelas</h1>
        
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <a href="kelola-kelas-daycare" class="text-decoration-none">
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/daycare.jpg') }}" 
                            class="card-img-top rounded-top-4" 
                            alt="foto murid Daycare" 
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">DAYCARE</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a href="kelola-kelas-tk-a" class="text-decoration-none">
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-a.jpg') }}"
                            class="card-img-top rounded-top-4" 
                            alt="foto murid TK A" 
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">TK A</h3>
                            <p class="card-text text-primary-custom">Cek dan catat kehadiran guru</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="kelola-kelas-tk-b" class="text-decoration-none">
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/tk-b.jpg') }}" 
                            class="card-img-top rounded-top-4" 
                            alt="foto murid TK B" 
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">TK B</h3>
                            <p class="card-text text-primary-custom">Lihat rekam jejak kehadiran</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col">
                <a href="kelola-kelas-bestari" class="text-decoration-none">
                    <div class="card h-100 shadow-sm rounded-4">
                        <img src="{{ asset('Assets/presensi/bestari.jpg') }}" 
                            class="card-img-top rounded-top-4" 
                            alt="foto murid Bestari" 
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title text-primary-custom">BESTARI</h3>
                            <p class="card-text text-primary-custom">Pantau absensi siswa harian</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="text-center my-4">
            <button class="btn button btn-mg mb-4" id="tambahSiswaBtn">Tambah Siswa</button>
        </div>

        <!-- Pop-up Form -->
        <div id="tambahSiswaModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahSiswaForm">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="laki-laki" value="Laki-laki" required>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas:</label>
                                <select class="form-control" id="kelas" required>
                                    <option value="" disabled selected>Pilih Kelas...</option>
                                    <option value="Daycare">Daycare</option>
                                    <option value="TK A">TK A</option>
                                    <option value="TK B">TK B</option>
                                    <option value="Bestari">Bestari</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="simpanSiswaBtn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
        // Script untuk menampilkan modal
        document.getElementById('tambahSiswaBtn').addEventListener('click', function() {
            $('#tambahSiswaModal').modal('show');
        });

        // Script untuk menyimpan data siswa (saat ini hanya menampilkan alert)
        document.getElementById('simpanSiswaBtn').addEventListener('click', function() {
            const nama = document.getElementById('nama').value;
            const jenisKelamin = document.querySelector('input[name="jenisKelamin"]:checked').value;
            const kelas = document.getElementById('kelas').value;

            // Lakukan penyimpanan data di sini (misalnya, kirim ke server)

            alert(`Siswa ditambahkan:\nNama: ${nama}\nJenis Kelamin: ${jenisKelamin}\nKelas: ${kelas}`);
            $('#tambahSiswaModal').modal('hide');
            document.getElementById('tambahSiswaForm').reset(); // Reset form
        });
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</x-layout-admin>