@php
    $kelas = 'TK B';
@endphp

<x-admin-layout>
    <div class="container">
        <h1 class="text-center inter-font text-primary-custom mb-5" style="font-size: 32px;">
            Absen Kehadiran Siswa {{ $kelas }} Tahfidz Preneur Duta Firdaus <br> Tahun Ajaran 2024-2025
        </h1>

        <div class="d-flex justify-content-center my-4">
            <div class="mx-2">
                <label for="bulan">Bulan:</label>
                <select id="bulan" class="form-select" onchange="updateTanggal()">
                    <option value="">Pilih Bulan...</option>
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

        <div id="pilihBulanAlert" class="alert alert-info text-center">
            Silakan pilih bulan untuk melihat data presensi
        </div>

        <div class="container px-4" id="tanggal-container" style="display: none;">
            <div class="row-cols-10 g-2 justify-content-center gap-2 my-2 d-grid grid-template-columns-10 mx-auto"
                 style="grid-template-columns: repeat(10, 1fr); max-width: 60%;" id="tanggal-buttons">
            </div>
        </div>

        <div id="pilihTanggalAlert" class="alert alert-info text-center" style="display: none;">
            Silakan pilih tanggal untuk melihat data presensi
        </div>

        @if (request()->has('tanggal'))
            <div class="container my-4" id="absensi-table">
                <table class="table table-bordered table-striped w-75 mx-auto">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($presensiData as $index => $siswa)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $siswa['nama'] }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $siswa['kehadiran'] == 'Hadir' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $siswa['kehadiran'] }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $siswa['keterangan'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data presensi untuk tanggal ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if ($presensiData->isNotEmpty())
                    <div class="mt-4">
                        <x-ttd-laporan />
                        <x-download-button />
                    </div>
                @endif
            </div>
        @endif

        <script>
            function getNamaHari(date) {
                const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                return hari[date.getDay()];
            }

            function setTanggal(tanggal) {
                const bulan = document.getElementById('bulan').value;
                const tahun = new Date().getFullYear();
                const namaBulan = {
                    'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
                    'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
                    'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
                };

                const date = new Date(tahun, namaBulan[bulan], tanggal);
                const namaHari = getNamaHari(date);

                // Update the display date
                document.getElementById('tanggal').value = `${namaHari}, ${tanggal} ${bulan} ${tahun}`;

                // Format tanggal untuk form submission
                const formattedDate = `${tahun}-${String(namaBulan[bulan] + 1).padStart(2, '0')}-${String(tanggal).padStart(2, '0')}`;

                // Store current selections in localStorage
                localStorage.setItem('selectedBulan', bulan);
                localStorage.setItem('selectedTanggal', tanggal);
                localStorage.setItem('displayDate', document.getElementById('tanggal').value);

                // Create and submit form
                const form = document.createElement('form');
                form.method = 'GET';
                form.action = '{{ route("laporan-tk-b") }}';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'tanggal';
                input.value = formattedDate;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }

            function updateTanggal() {
                const bulan = document.getElementById('bulan').value;
                const tanggalContainer = document.getElementById('tanggal-container');
                const tanggalButtons = document.getElementById('tanggal-buttons');
                const pilihBulanAlert = document.getElementById('pilihBulanAlert');
                const pilihTanggalAlert = document.getElementById('pilihTanggalAlert');
                const absensiTable = document.getElementById('absensi-table');
                const tanggalInput = document.getElementById('tanggal');
                const signatureContainer = document.getElementById('signature-container');

                // Clear input and table when selecting empty option
                if (!bulan) {
                    tanggalInput.value = '';
                    if (absensiTable) {
                        absensiTable.style.display = 'none';
                    }
                    if (signatureContainer) {
                        signatureContainer.style.display = 'none';
                    }
                    localStorage.removeItem('selectedBulan');
                    localStorage.removeItem('selectedTanggal');
                    localStorage.removeItem('displayDate');
                }

                if (bulan) {
                    pilihBulanAlert.style.display = 'none';
                    tanggalContainer.style.display = 'block';
                    pilihTanggalAlert.style.display = 'block';

                    // Don't clear the tanggal input if there's a saved value
                    const savedDisplayDate = localStorage.getItem('displayDate');
                    if (!savedDisplayDate) {
                        tanggalInput.value = '';
                    }

                    tanggalButtons.innerHTML = '';

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
                } else {
                    pilihBulanAlert.style.display = 'block';
                    tanggalContainer.style.display = 'none';
                    pilihTanggalAlert.style.display = 'none';
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const savedBulan = localStorage.getItem('selectedBulan');
                const savedDisplayDate = localStorage.getItem('displayDate');

                if (savedBulan) {
                    document.getElementById('bulan').value = savedBulan;
                    updateTanggal();
                }

                if (savedDisplayDate) {
                    document.getElementById('tanggal').value = savedDisplayDate;
                    // Show signature if table is visible
                    const absensiTable = document.getElementById('absensi-table');
                    const signatureContainer = document.getElementById('signature-container');
                    if (absensiTable && signatureContainer && window.getComputedStyle(absensiTable).display !== 'none') {
                        signatureContainer.style.display = 'block';
                    }
                }

                // Show/hide elements based on saved state
                const tanggalContainer = document.getElementById('tanggal-container');
                const pilihBulanAlert = document.getElementById('pilihBulanAlert');
                const pilihTanggalAlert = document.getElementById('pilihTanggalAlert');


                if (savedBulan) {
                    pilihBulanAlert.style.display = 'none';
                    tanggalContainer.style.display = 'block';
                    pilihTanggalAlert.style.display = savedDisplayDate ? 'none' : 'block';
                } else {
                    tanggalContainer.style.display = 'none';
                    pilihBulanAlert.style.display = 'block';
                    pilihTanggalAlert.style.display = 'none';
                }
            });
        </script>
    </div>
</x-admin-layout>
