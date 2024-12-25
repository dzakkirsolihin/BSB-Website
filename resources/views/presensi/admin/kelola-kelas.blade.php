<x-admin-layout>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Murid dalam Kelas</h1>

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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahSiswaForm">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nama" class="form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Kelamin:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" required>
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kelas" class="form-label">Kelas:</label>
                                <select class="form-control" id="kelas" name="kelas" required>
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
                        <button type="button" class="btn btn-secondary" id="tutupModalBtn">Tutup</button>
                        <button type="button" class="btn btn-primary" id="simpanSiswaBtn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script>
    // Tunggu sampai DOM sepenuhnya dimuat
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('tambahSiswaModal'));
        const form = document.getElementById('tambahSiswaForm');
        let originalFormData = {};
    
        // Fungsi untuk mengecek apakah form telah diubah
        function hasFormChanged() {
            const nama = document.getElementById('nama').value;
            const jenisKelamin = document.querySelector('input[name="jenis_kelamin"]:checked')?.value;
            const kelas = document.getElementById('kelas').value;
    
            return nama !== originalFormData.nama ||
                    jenisKelamin !== originalFormData.jenisKelamin ||
                    kelas !== originalFormData.kelas;
        }
    
        // Fungsi untuk menyimpan data form original
        function storeOriginalFormData() {
            originalFormData = {
                nama: document.getElementById('nama').value,
                jenisKelamin: document.querySelector('input[name="jenis_kelamin"]:checked')?.value,
                kelas: document.getElementById('kelas').value
            };
        }
    
        // Fungsi untuk reset form
        function resetForm() {
            form.reset();
            originalFormData = {};
        }
    
        // Event listener untuk tombol tambah siswa
        document.getElementById('tambahSiswaBtn').addEventListener('click', function() {
            modal.show();
            storeOriginalFormData();
        });
    
        // Event listener untuk tombol tutup
        document.getElementById('tutupModalBtn').addEventListener('click', function() {
            handleClose();
        });
    
        // Event listener untuk tombol close (X)
        document.querySelector('.btn-close').addEventListener('click', function() {
            handleClose();
        });
    
        // Fungsi untuk handle penutupan modal
        function handleClose() {
            if (hasFormChanged()) {
                if (confirm('Apakah Anda yakin ingin membatalkan? Data yang Anda masukkan akan hilang.')) {
                    modal.hide();
                    resetForm();
                }
            } else {
                modal.hide();
                resetForm();
            }
        }
    
        // Event listener untuk tombol simpan
        document.getElementById('simpanSiswaBtn').addEventListener('click', function() {
            if (form.checkValidity()) {
                const formData = new FormData(form);
    
                // Kirim data ke server
                fetch('/siswa', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(Object.fromEntries(formData))
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Siswa berhasil ditambahkan');
                        modal.hide();
                        resetForm();
                        // Opsional: Refresh halaman atau update tampilan
                        window.location.reload();
                    } else {
                        alert('Terjadi kesalahan: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan data');
                });
            } else {
                form.reportValidity();
            }
        });
    
        // Event listener untuk modal hidden
        document.getElementById('tambahSiswaModal').addEventListener('hidden.bs.modal', function() {
            resetForm();
        });
    });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</x-admin-layout>
