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
        </div>
    </div>

    <div class="container px-4" id="tanggal-container" style="display: none;">
        <div class="row-cols-10 g-2 justify-content-center gap-2 my-2 d-grid grid-template-columns-10 mx-auto" style="grid-template-columns: repeat(10, 1fr); max-width: 60%;" id="tanggal-buttons">
            <!-- Buttons will be generated here -->
        </div>
    </div>



    <script>
        // Fungsi untuk mendapatkan nama hari dalam Bahasa Indonesia
        function getNamaHari(date) {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            return hari[date.getDay()];
        }

        // Fungsi untuk mengatur tanggal ketika tombol tanggal diklik
        function setTanggal(tanggal) {
            const bulan = document.getElementById('bulan').value;
            const tahun = new Date().getFullYear();

            // Konversi nama bulan ke angka bulan (0-11)
            const namaBulan = {
                'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
                'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
                'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
            };

            // Buat objek Date dengan format yang benar
            const date = new Date(tahun, namaBulan[bulan], tanggal);
            const namaHari = getNamaHari(date);
            document.getElementById('tanggal').value = `${namaHari}, ${tanggal} ${bulan} ${tahun}`;
            document.getElementById('absensi-table').style.display = 'block';
            document.getElementById('signature-container').style.display = 'block';
        }

        // Menambahkan event listener untuk setiap tombol tanggal
        function updateTanggal() {
            const bulan = document.getElementById('bulan').value;
            const tanggalContainer = document.getElementById('tanggal-container');
            const tanggalButtons = document.getElementById('tanggal-buttons');
            const tanggalInput = document.getElementById('tanggal');
            tanggalInput.value = '';
            tanggalButtons.innerHTML = '';
            document.getElementById('absensi-table').style.display = 'none';
            document.getElementById('signature-container').style.display = 'none';

            if (bulan) {
                const tahun = new Date().getFullYear();
                const namaBulan = {
                    'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
                    'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
                    'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
                };
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
                tanggalContainer.style.display = 'block';
            } else {
                tanggalContainer.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTanggal();
        });
    </script>

    @php
    $presensiData = [
        [
            'id' => 1,
            'nama' => 'Aisyah',
            'pengantar' => 'Ayah',
            'waktu_datang' => '07:30',
            'penjemput' => 'Ibu',
            'waktu_pulang' => '15:45'
        ],
        [
            'id' => 2,
            'nama' => 'Bagas',
            'pengantar' => 'Ibu',
            'waktu_datang' => '07:15',
            'penjemput' => 'Ayah',
            'waktu_pulang' => '16:00'
        ],
        [
            'id' => 3,
            'nama' => 'Bima',
            'pengantar' => 'Keluarga (Kakak)',
            'waktu_datang' => '07:45',
            'penjemput' => 'Ibu',
            'waktu_pulang' => '15:30'
        ],
        [
            'id' => 4,
            'nama' => 'Dina',
            'pengantar' => 'Ayah',
            'waktu_datang' => '07:20',
            'penjemput' => 'Keluarga (Nenek)',
            'waktu_pulang' => '15:15'
        ],
        [
            'id' => 5,
            'nama' => 'Fajar',
            'pengantar' => 'Ibu',
            'waktu_datang' => '07:25',
            'penjemput' => 'Ibu',
            'waktu_pulang' => '15:50'
        ],
        [
            'id' => 6,
            'nama' => 'Laras',
            'pengantar' => 'Keluarga (Paman)',
            'waktu_datang' => '07:40',
            'penjemput' => 'Ayah',
            'waktu_pulang' => '16:00'
        ],
        [
            'id' => 7,
            'nama' => 'Nayla',
            'pengantar' => 'Ayah',
            'waktu_datang' => '07:10',
            'penjemput' => 'Keluarga (Bibi)',
            'waktu_pulang' => '15:40'
        ],
        [
            'id' => 8,
            'nama' => 'Putri',
            'pengantar' => 'Ibu',
            'waktu_datang' => '07:35',
            'penjemput' => 'Ibu',
            'waktu_pulang' => '15:25'
        ],
        [
            'id' => 9,
            'nama' => 'Salsabila',
            'pengantar' => 'Keluarga (Kakek)',
            'waktu_datang' => '07:30',
            'penjemput' => 'Ayah',
            'waktu_pulang' => '15:55'
        ],
        [
            'id' => 10,
            'nama' => 'Zidan',
            'pengantar' => 'Ayah',
            'waktu_datang' => '07:20',
            'penjemput' => 'Ibu',
            'waktu_pulang' => '15:35'
        ]
    ];
    @endphp

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
            <tbody>
                @foreach($presensiData as $index => $siswa)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $siswa['nama'] }}</td>
                        <td>{{ $siswa['pengantar'] }}</td>
                        <td class="text-center">{{ $siswa['waktu_datang'] }}</td>
                        <td>{{ $siswa['penjemput'] }}</td>
                        <td class="text-center">{{ $siswa['waktu_pulang'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container  w-75" id="signature-container" style="display: none;">
        <div class="bg-a5f2c0 rounded-3 p-4 ms-0" style="width: fit-content; min-width: 300px;">
            <p class="mb-1">Mengetahui,</p>
            <p class="mb-1">Kepala Sekolah TPA Tahfidz Preneur Duta Firdaus</p>
            <div style="height: 100px;"></div>
            <p class="mb-0">Sri Wahyuni Solihah, S.Ag.M.Pd</p>
        </div>
    </div>
</x-admin-layout>
