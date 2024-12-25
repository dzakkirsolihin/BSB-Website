<x-admin-layout>
    <div class="container">
        <h1 class="text-center inter-font text-primary-custom mb-5" style="font-size: 32px;">
            Rekapitulasi Absensi Guru {{ $kelas }} Duta Firdaus <br> Tahun Ajaran 2024-2025
        </h1>

        <div class="d-flex justify-content-center my-4">
            <div class="mx-2">
                <label for="bulan">Bulan:</label>
                <select id="bulan" class="form-select">
                    <option value="" disabled selected>Pilih Bulan...</option>
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}">
                            {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mx-2">
                <label for="tahun">Tahun:</label>
                <select id="tahun" class="form-select">
                    @foreach(range(date('Y')-1, date('Y')+1) as $y)
                        <option value="{{ $y }}" {{ date('Y') == $y ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mx-2">
                <label class="d-block">&nbsp;</label>
                <button class="btn btn-primary" id="tampilkanBtn">Tampilkan</button>
            </div>
        </div>

        <!-- Alert untuk memilih tanggal -->
        <div id="pilihTanggalAlert" class="alert alert-info text-center">
            Silakan pilih bulan untuk melihat data presensi
        </div>

        <!-- Alert untuk proses loading -->
        <div id="loadingAlert" class="alert alert-warning text-center" style="display: none;">
            Sedang memuat data...
        </div>

        <div class="container my-4" id="absensi-table" style="display: none;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped w-100 mx-auto">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2" class="align-middle">Tanggal</th>
                            <th rowspan="2" class="align-middle">Hari</th>
                            @foreach($guru as $g)
                                <th colspan="6" class="align-middle">{{ $g->nama }}</th>
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($guru as $g)
                                <th>JD</th>
                                <th>JP</th>
                                <th>SK</th>
                                <th>Keterangan</th>
                                <th>Koordinat</th>
                                <th>Foto</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be filled via JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Keterangan:</h5>
                        <ul class="list-unstyled">
                            <li>JD: Jam Datang</li>
                            <li>JP: Jam Pulang</li>
                            <li>SK: Status Kehadiran</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Status Kehadiran:</h5>
                        <ul class="list-unstyled">
                            <li><span class="badge bg-success">Hadir</span></li>
                            <li><span class="badge bg-warning">Izin</span></li>
                            <li><span class="badge bg-danger">Tanpa Keterangan</span></li>
                            <li><span class="badge bg-info">Sakit</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <x-ttd-laporan />
            <x-download-button />
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const guruData = @json($guru);
            
            // Get DOM elements
            const tableContainer = document.getElementById('absensi-table');
            const pilihTanggalAlert = document.getElementById('pilihTanggalAlert');
            const loadingAlert = document.getElementById('loadingAlert');
            const bulanSelect = document.getElementById('bulan');
            const tahunSelect = document.getElementById('tahun');
            const tampilkanBtn = document.getElementById('tampilkanBtn');
            
            function getStatusBadge(status) {
                const badges = {
                    'Hadir': 'bg-success',
                    'Izin': 'bg-warning',
                    'Sakit': 'bg-info',
                    'Tanpa Keterangan': 'bg-danger'
                };
                return `<span class="badge ${badges[status] || 'bg-secondary'}">${status}</span>`;
            }

            function generateDummyData(daysInMonth, tahun, bulan) {
                let presensiData = [];
                const formattedMonth = String(bulan).padStart(2, '0');

                for (let day = 1; day <= daysInMonth; day++) {
                    const formattedDay = String(day).padStart(2, '0');
                    const currentDate = new Date(`${tahun}-${formattedMonth}-${formattedDay}`);
                    const isWeekend = [0, 6].includes(currentDate.getDay());

                    if (!isWeekend) {
                        guruData.forEach(guru => {
                            if (Math.random() > 0.2) {
                                presensiData.push({
                                    guru_id: guru.id,
                                    tanggal: `${tahun}-${formattedMonth}-${formattedDay}`,
                                    jam_datang: `07:${String(Math.floor(Math.random() * 30)).padStart(2, '0')}`,
                                    jam_pulang: `16:${String(Math.floor(Math.random() * 30)).padStart(2, '0')}`,
                                    status_kehadiran: 'Hadir',
                                    keterangan: '',
                                    koordinat: `S-6.${Math.floor(Math.random() * 900000 + 100000)}, E-106.${Math.floor(Math.random() * 900000 + 100000)}`,
                                    foto: '/public/Assets/laporan/presensi' + (Math.floor(Math.random() * 5) + 1) + '.jpg'
                                });
                            } else {
                                const statuses = ['Sakit', 'Izin', 'Tanpa Keterangan'];
                                const status = statuses[Math.floor(Math.random() * statuses.length)];
                                presensiData.push({
                                    guru_id: guru.id,
                                    tanggal: `${tahun}-${formattedMonth}-${formattedDay}`,
                                    jam_datang: null,
                                    jam_pulang: null,
                                    status_kehadiran: status,
                                    keterangan: status === 'Sakit' ? 'Demam' : (status === 'Izin' ? 'Urusan Keluarga' : ''),
                                    koordinat: null,
                                    foto: null
                                });
                            }
                        });
                    }
                }

                return presensiData;
            }

            function updateTableContent(daysInMonth, yearMonth, presensiData) {
                const tableBody = document.getElementById('tableBody');
                let html = '';

                for (let i = 1; i <= daysInMonth; i++) {
                    const currentDate = new Date(`${yearMonth}-${String(i).padStart(2, '0')}`);
                    const dayName = hari[currentDate.getDay()];
                    const isWeekend = [0, 6].includes(currentDate.getDay());
                    const dateString = `${yearMonth}-${String(i).padStart(2, '0')}`;
                    
                    html += `<tr class="${isWeekend ? 'table-secondary' : ''}">
                        <td class="text-center">${i}</td>
                        <td class="text-center">${dayName}</td>`;
                    
                    guruData.forEach(guru => {
                        const guruPresensi = presensiData.find(p => 
                            p.guru_id === guru.id && 
                            p.tanggal === dateString
                        );

                        if (isWeekend) {
                            html += `<td class="text-center" colspan="6">Libur Weekend</td>`;
                        } else if (guruPresensi) {
                            html += `
                                <td class="text-center">${guruPresensi.jam_datang || '-'}</td>
                                <td class="text-center">${guruPresensi.jam_pulang || '-'}</td>
                                <td class="text-center">${getStatusBadge(guruPresensi.status_kehadiran)}</td>
                                <td class="text-center">${guruPresensi.keterangan || '-'}</td>
                                <td class="text-center">${guruPresensi.koordinat || '-'}</td>
                                <td class="text-center">${guruPresensi.foto ? 
                                    `<img src="${guruPresensi.foto}" alt="Foto" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">` : 
                                    '-'}</td>
                            `;
                        } else {
                            html += `
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                                <td class="text-center">-</td>
                            `;
                        }
                    });

                    html += '</tr>';
                }

                tableBody.innerHTML = html;
            }

            function updateAbsensiTable() {
                const bulan = bulanSelect.value;
                const tahun = tahunSelect.value;
                
                if (!bulan || !tahun) {
                    alert('Silakan pilih bulan terlebih dahulu');
                    return;
                }

                // Show loading alert
                pilihTanggalAlert.style.display = 'none';
                loadingAlert.style.display = 'block';
                tableContainer.style.display = 'none';

                // Simulate loading delay
                setTimeout(() => {
                    const daysInMonth = new Date(tahun, bulan, 0).getDate();
                    const presensiData = generateDummyData(daysInMonth, tahun, bulan);
                    updateTableContent(daysInMonth, `${tahun}-${String(bulan).padStart(2, '0')}`, presensiData);

                    // Hide loading alert and show table
                    loadingAlert.style.display = 'none';
                    tableContainer.style.display = 'block';
                    document.getElementById('signature-container').style.display = 'block';
                }, 500); // 500ms delay untuk efek loading
            }

            // Event listener untuk tombol tampilkan
            tampilkanBtn.addEventListener('click', updateAbsensiTable);

            // Reset tampilan saat bulan berubah
            bulanSelect.addEventListener('change', function() {
                tableContainer.style.display = 'none';
                pilihTanggalAlert.style.display = 'block';
                loadingAlert.style.display = 'none';
            });

            // Reset tampilan saat tahun berubah
            tahunSelect.addEventListener('change', function() {
                if (bulanSelect.value) {
                    updateAbsensiTable();
                }
            });
        });
    </script>
</x-layout-admin>
