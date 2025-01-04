<x-admin-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-center text-3xl font-bold text-primary-custom mb-8">
            Rekapitulasi Absensi Guru {{ $kelas }} Duta Firdaus <br> 
            Tahun Ajaran 2024-2025
        </h1>

        {{-- Filter Section --}}
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <div class="d-flex align-items-end gap-3">
                    <div>
                        <label for="bulan" class="form-label">Bulan:</label>
                        <select id="bulan" class="form-select">
                            <option value="" selected>Pilih Bulan...</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}">
                                    {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tahun" class="form-label">Tahun:</label>
                        <select id="tahun" class="form-select">
                            @foreach(range(date('Y')-1, date('Y')+1) as $y)
                                <option value="{{ $y }}" {{ date('Y') == $y ? 'selected' : '' }}>
                                    {{ $y }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button id="tampilkanBtn" class="btn btn-primary">
                            Tampilkan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alerts --}}
        <div id="pilihTanggalAlert" class="alert alert-info">
            Silakan pilih bulan dan tahun untuk melihat data presensi
        </div>

        <div id="loadingAlert" class="alert alert-warning d-none">
            Sedang memuat data...
        </div>

        {{-- Table Section --}}
        <div id="absensi-table" class="d-none">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
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
                                <th>Ket</th>
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
        
            <div class="row mt-4">
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
                        <li><span class="badge bg-warning text-dark">Izin</span></li>
                        <li><span class="badge bg-danger">Tanpa Keterangan</span></li>
                        <li><span class="badge bg-info text-dark">Sakit</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Add SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    'Hadir': 'badge bg-success',
                    'Izin': 'badge bg-warning text-dark',
                    'Sakit': 'badge bg-info text-dark',
                    'Tanpa Keterangan': 'badge bg-danger'
                };
                return `<span class="${badges[status] || badges['Tanpa Keterangan']}">${status}</span>`;
            }
            
            function validateDate(selectedMonth, selectedYear) {
                const today = new Date();
                const selectedDate = new Date(selectedYear, selectedMonth - 1);
                
                if (selectedDate > today) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data Tidak Tersedia',
                        text: 'Data presensi untuk periode yang dipilih belum tersedia',
                        confirmButtonColor: '#3B82F6'
                    });
                    return false;
                }
                return true;
            }

            function formatTime(timeString) {
                if (!timeString) return '-';
                return timeString.substring(0, 5); // Format HH:mm
            }

            function validateInputs() {
                const bulan = bulanSelect.value;
                const tahun = tahunSelect.value;

                if (!bulan || !tahun) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        text: 'Silakan pilih bulan dan tahun terlebih dahulu'
                    });
                    return false;
                }
                return true;
            }

            function updateTableContent(yearMonth, presensiData) {
                const tableBody = document.getElementById('tableBody');
                const [year, month] = yearMonth.split('-');
                const today = new Date();
                const currentMonth = today.getMonth() + 1;
                const currentYear = today.getFullYear();
                
                let lastDay;
                if (parseInt(year) === currentYear && parseInt(month) === currentMonth) {
                    lastDay = today.getDate();
                } else {
                    lastDay = new Date(year, month, 0).getDate();
                }
                
                let html = '';
                
                for (let i = 1; i <= lastDay; i++) {
                    const currentDate = new Date(`${yearMonth}-${String(i).padStart(2, '0')}`);
                    const dayName = hari[currentDate.getDay()];
                    const isWeekend = [0, 6].includes(currentDate.getDay());
                    const dateString = `${yearMonth}-${String(i).padStart(2, '0')}`;
                    
                    html += `<tr class="${isWeekend ? 'table-secondary' : ''}">
                        <td class="text-center">${i}</td>
                        <td class="text-center">${dayName}</td>`;
                    
                    if (isWeekend) {
                        guruData.forEach(() => {
                            html += `<td class="text-center" colspan="6">
                                <span class="badge bg-secondary">Libur Weekend</span>
                            </td>`;
                        });
                    } else {
                        guruData.forEach(guru => {
                            const presensi = presensiData.find(p => 
                                p.nip === guru.nip && 
                                p.created_at.startsWith(dateString)
                            );

                            if (presensi) {
                                html += `
                                    <td class="text-center">${formatTime(presensi.jam_datang)}</td>
                                    <td class="text-center">${formatTime(presensi.jam_pulang)}</td>
                                    <td class="text-center">${getStatusBadge(presensi.status_kehadiran)}</td>
                                    <td class="text-center">${presensi.keterangan || '-'}</td>
                                    <td class="text-center small">${presensi.koordinat || '-'}</td>
                                    <td class="text-center">
                                        ${presensi.foto ? 
                                            `<img src="/storage/${presensi.foto}" alt="Foto Presensi" 
                                                class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                                                onclick="showImageModal('/storage/${presensi.foto}')">` : 
                                            '-'}
                                    </td>`;
                            } else {
                                html += `
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">${getStatusBadge('Tanpa Keterangan')}</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>`;
                            }
                        });
                    }
                    html += '</tr>';
                }
                
                tableBody.innerHTML = html;
            }

            async function updateAbsensiTable() {
                if (!validateInputs()) {
                    return;
                }

                const bulan = bulanSelect.value;
                const tahun = tahunSelect.value;

                if (!validateDate(parseInt(bulan), parseInt(tahun))) {
                    return;
                }

                // Show loading state
                pilihTanggalAlert.classList.add('d-none');
                loadingAlert.classList.remove('d-none');
                tableContainer.classList.add('d-none');

                try {
                    const response = await fetch(`/dashboard-admin/get-presensi-guru?tahun=${tahun}&bulan=${bulan}&guru=${JSON.stringify(guruData.map(g => g.nip))}`);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const presensiData = await response.json();
                    
                    if (presensiData.error) {
                        throw new Error(presensiData.error);
                    }
                    
                    updateTableContent(`${tahun}-${String(bulan).padStart(2, '0')}`, presensiData);
                    
                    // Show table
                    loadingAlert.classList.add('d-none');
                    tableContainer.classList.remove('d-none');
                } catch (error) {
                    console.error('Error:', error);
                    loadingAlert.classList.add('d-none');
                    pilihTanggalAlert.classList.remove('d-none');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan saat memuat data'
                    });
                }
            }

            // Event listener for image modal
            window.showImageModal = function(src) {
                Swal.fire({
                    imageUrl: src,
                    imageAlt: 'Foto Presensi',
                    width: 'auto',
                    showCloseButton: true,
                    showConfirmButton: false
                });
            }

            // Event listeners
            tampilkanBtn.addEventListener('click', updateAbsensiTable);
            
            bulanSelect.addEventListener('change', function() {
                tableContainer.classList.add('d-none');
                pilihTanggalAlert.classList.remove('d-none');
                loadingAlert.classList.add('d-none');
            });
            
            tahunSelect.addEventListener('change', function() {
                tableContainer.classList.add('d-none');
                pilihTanggalAlert.classList.remove('d-none');
                loadingAlert.classList.add('d-none');
            });
        });
    </script>
</x-layout-admin>