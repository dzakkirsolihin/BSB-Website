<x-admin-layout>
    <h1 class="text-center inter-font text-primary-custom mb-5" style="font-size: 32px;">
        Absen Datang Dan Jemput Siswa TPA Tahfidz Preneur Duta Firdaus <br> Tahun Ajaran 2024-2025
    </h1>

    <div class="d-flex justify-content-center my-4">
        <div class="mx-2">
            <label for="bulan">Bulan:</label>
            <select id="bulan" class="form-select" onchange="updateTanggal()">
                <option value="" disabled selected>Pilih Bulan...</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
        <div class="mx-2">
            <label for="tanggal">Hari/Tanggal:</label>
            <input id="tanggal" class="form-control" type="text" readonly>
            <input type="hidden" id="tanggalDatabase">
        </div>
    </div>
    
    <!-- Alert Pilih Bulan -->
    <div id="pilihBulanAlert" class="alert alert-info text-center">
        Silakan pilih bulan untuk melihat data presensi
    </div>
    
    <div class="container px-4" id="tanggal-container" style="display: none;">
        <div class="row-cols-10 g-2 justify-content-center gap-2 my-2 d-grid grid-template-columns-10 mx-auto" 
             style="grid-template-columns: repeat(10, 1fr); max-width: 60%;" id="tanggal-buttons">
            <!-- Buttons will be generated here -->
        </div>
    </div>
    
    <!-- Alert Pilih Tanggal -->
    <div id="pilihTanggalAlert" class="alert alert-info text-center" style="display: none;">
        Silakan pilih tanggal untuk melihat data presensi
    </div>
    
    <div class="container my-4" id="absensi-table" style="display: none;">
        <table class="table table-bordered table-striped w-75 mx-auto">
            <thead class="text-center">
                <tr>
                    <th rowspan="2" class="align-middle">No</th>
                    <th rowspan="2" class="align-middle">Nama</th>
                    <th colspan="2">Pengantar</th>
                    <th colspan="2">Penjemput</th>
                </tr>
                <tr>
                    <th>Nama</th>
                    <th>Datang</th>
                    <th>Nama</th>
                    <th>Pulang</th>
                </tr>
            </thead>
            <tbody id="absensi-body">
                <!-- Data will be populated here -->
            </tbody>
        </table>
        <!-- Wrap ttd-laporan dengan div yang memiliki width dan margin yang sama dengan tabel -->
        <div class="w-75 mx-auto">
            <x-ttd-laporan></x-ttd-laporan>
        </div>

        <!-- Tombol Unduh dengan Dropdown Format -->
        <x-download-button :kelas="'Daycare'"></x-download-button>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const namaBulan = {
            'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
            'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
            'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
        };
        
        function validateDate(selectedDate) {
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (selectedDate > today) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Tidak Tersedia',
                    text: 'Data presensi untuk tanggal yang dipilih belum tersedia',
                    confirmButtonColor: '#3085d6'
                });
                return false;
            }
            return true;
        }

        function getNamaHari(date) {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            return hari[date.getDay()];
        }

        function setTanggal(tanggal) {
            const bulan = document.getElementById('bulan').value;
            const tahun = new Date().getFullYear();
            const date = new Date(tahun, namaBulan[bulan], tanggal);
            
            if (!validateDate(date)) {
                return;
            }

            const namaHari = getNamaHari(date);
            document.getElementById('tanggal').value = `${namaHari}, ${tanggal} ${bulan} ${tahun}`;
            
            // Format tanggal untuk database (YYYY-MM-DD)
            const month = (namaBulan[bulan] + 1).toString().padStart(2, '0');
            const day = tanggal.toString().padStart(2, '0');
            const databaseDate = `${tahun}-${month}-${day}`;
            document.getElementById('tanggalDatabase').value = databaseDate;

            // Fetch data presensi
            fetchPresensiData(databaseDate);
        }

        function fetchPresensiData(tanggal) {
            fetch(`/dashboard-admin/laporan-daycare/get-data?tanggal=${tanggal}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(result => {
                if (result.status === 'success') {
                    // Populate table
                    const tbody = document.getElementById('absensi-body');
                    tbody.innerHTML = '';
                    
                    result.data.forEach(siswa => {
                        tbody.innerHTML += `
                            <tr>
                                <td class="text-center">${siswa.no}</td>
                                <td>${siswa.nama}</td>
                                <td>${siswa.pengantar}</td>
                                <td class="text-center">${siswa.waktu_datang}</td>
                                <td>${siswa.penjemput}</td>
                                <td class="text-center">${siswa.waktu_pulang}</td>
                            </tr>
                        `;
                    });

                    // Show table
                    document.getElementById('absensi-table').style.display = 'block';
                    document.getElementById('pilihTanggalAlert').style.display = 'none';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: result.message,
                        confirmButtonColor: '#3085d6'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat mengambil data',
                    confirmButtonColor: '#3085d6'
                });
            });
        }

        function updateTanggal() {
            const bulan = document.getElementById('bulan').value;
            const tanggalContainer = document.getElementById('tanggal-container');
            const tanggalButtons = document.getElementById('tanggal-buttons');
            const tanggalInput = document.getElementById('tanggal');
            const pilihBulanAlert = document.getElementById('pilihBulanAlert');
            const pilihTanggalAlert = document.getElementById('pilihTanggalAlert');
            const absensiTable = document.getElementById('absensi-table');
            
            // Reset tampilan
            tanggalInput.value = '';
            tanggalButtons.innerHTML = '';
            absensiTable.style.display = 'none';

            if (bulan) {
                const today = new Date();
                const selectedDate = new Date(today.getFullYear(), namaBulan[bulan]);
                
                if (selectedDate > today) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data Tidak Tersedia',
                        text: 'Data presensi untuk bulan yang dipilih belum tersedia',
                        confirmButtonColor: '#3085d6'
                    });
                    document.getElementById('bulan').value = '';
                    pilihBulanAlert.style.display = 'block';
                    tanggalContainer.style.display = 'none';
                    pilihTanggalAlert.style.display = 'none';
                    return;
                }

                pilihBulanAlert.style.display = 'none';
                tanggalContainer.style.display = 'block';
                pilihTanggalAlert.style.display = 'block';

                const tahun = new Date().getFullYear();
                const daysInMonth = new Date(tahun, namaBulan[bulan] + 1, 0).getDate();

                for (let i = 1; i <= daysInMonth; i++) {
                    const button = document.createElement('button');
                    button.className = 'btn-tanggal btn bg-a5f2c0 rounded-3 p-2 bg-success text-white d-flex justify-content-center align-items-center';
                    button.style.width = '100%';
                    button.style.height = '35px';
                    button.style.fontSize = '14px';
                    button.textContent = i;
                    button.onclick = function() { setTanggal(i); };
                    tanggalButtons.appendChild(button);
                }
            } else {
                pilihBulanAlert.style.display = 'block';
                tanggalContainer.style.display = 'none';
                pilihTanggalAlert.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tanggalContainer = document.getElementById('tanggal-container');
            const pilihBulanAlert = document.getElementById('pilihBulanAlert');
            const pilihTanggalAlert = document.getElementById('pilihTanggalAlert');
            const absensiTable = document.getElementById('absensi-table');
            
            tanggalContainer.style.display = 'none';
            absensiTable.style.display = 'none';
            pilihBulanAlert.style.display = 'block';
            pilihTanggalAlert.style.display = 'none';
        });
    </script>
</x-admin-layout>