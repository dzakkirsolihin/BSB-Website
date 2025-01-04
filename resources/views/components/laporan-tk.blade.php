@props(['kelas', 'routeName', 'presensiData'])

<x-admin-layout>
    {{-- Header Section --}}
    <div class="container">
        <header class="pt-4">
            <h1 class="text-center inter-font text-primary-custom mb-5" style="font-size: 32px;">
                Absen Kehadiran Siswa {{ $kelas }} Tahfidz Preneur Duta Firdaus <br> Tahun Ajaran 2024-2025
            </h1>
        </header>

        {{-- Date Selection Form --}}
        <div class="row justify-content-center mb-5 mt-4">
            <div class="col-md-8">
                <div class="d-flex justify-content-center gap-3">
                    <div class="flex-grow-1" style="max-width: 200px;">
                        <label for="bulan" class="form-label">Bulan:</label>
                        <select id="bulan" class="form-select" onchange="AttendanceManager.handleMonthChange()">
                            <option value="">Pilih Bulan...</option>
                            @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                                <option value="{{ $month }}">{{ $month }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-grow-1" style="max-width: 300px;">
                        <label for="tanggal" class="form-label">Hari/Tanggal:</label>
                        <input id="tanggal" class="form-control" type="text" readonly>
                    </div>
                </div>
            </div>
        </div>

        {{-- Alerts --}}
        <div id="pilihBulanAlert" class="alert alert-info text-center mx-auto" style="max-width: 500px;">
            Silakan pilih bulan terlebih dahulu
        </div>

        {{-- Date Buttons Container --}}
        <div id="tanggal-container" class="container px-4 d-none mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div id="tanggal-buttons" class="d-grid gap-2" 
                         style="grid-template-columns: repeat(auto-fill, minmax(45px, 1fr));">
                    </div>
                    <div id="pilihTanggalAlert" class="alert alert-info text-center my-5">
                        Silakan pilih tanggal untuk melihat data presensi
                    </div>
                </div>
            </div>
        </div>

        {{-- Attendance Table --}}
        @if(request()->has('tanggal'))
            <div id="absensi-table-container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped mt-4 mb-5">
                            <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th style="width: 40%">Nama</th>
                                    <th style="width: 25%">Kehadiran</th>
                                    <th style="width: 25%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($presensiData as $index => $siswa)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $siswa['nama'] }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $siswa['kehadiran'] === 'Hadir' ? 'bg-success' : 'bg-danger' }}">
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

                        @if($presensiData->isNotEmpty())
                            <div class="mt-5">
                                <div class="mb-5">
                                    <x-ttd-laporan />
                                </div>
                                <div class="text-center">
                                    <x-download-button :kelas="$kelas" />
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div id="absensi-table-container" class="d-none"></div>
        @endif
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const AttendanceManager = {
            monthNames: {
                'Januari': 0, 'Februari': 1, 'Maret': 2, 'April': 3,
                'Mei': 4, 'Juni': 5, 'Juli': 6, 'Agustus': 7,
                'September': 8, 'Oktober': 9, 'November': 10, 'Desember': 11
            },
            
            dayNames: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],

            elements: {
                bulanSelect: document.getElementById('bulan'),
                tanggalInput: document.getElementById('tanggal'),
                tanggalContainer: document.getElementById('tanggal-container'),
                tanggalButtons: document.getElementById('tanggal-buttons'),
                pilihBulanAlert: document.getElementById('pilihBulanAlert'),
                pilihTanggalAlert: document.getElementById('pilihTanggalAlert'),
                absensiTableContainer: document.getElementById('absensi-table-container'),
            },

            init() {
                this.handleInitialLoad();
            },

            handleInitialLoad() {
                const urlParams = new URLSearchParams(window.location.search);
                const hasDateParam = urlParams.has('tanggal');

                if (!hasDateParam) {
                    this.resetForm();
                } else {
                    this.restoreFormState();
                }
            },

            resetForm() {
                localStorage.removeItem('selectedBulan');
                localStorage.removeItem('selectedTanggal');
                localStorage.removeItem('displayDate');
                
                this.elements.bulanSelect.value = '';
                this.elements.tanggalInput.value = '';
                this.elements.tanggalContainer.classList.add('d-none');
                this.elements.pilihBulanAlert.classList.remove('d-none');
                if (this.elements.absensiTableContainer) {
                    this.elements.absensiTableContainer.classList.add('d-none');
                }
            },

            restoreFormState() {
                const savedBulan = localStorage.getItem('selectedBulan');
                const savedDisplayDate = localStorage.getItem('displayDate');
                
                if (savedBulan) {
                    this.elements.bulanSelect.value = savedBulan;
                    this.handleMonthChange();
                }
                
                if (savedDisplayDate) {
                    this.elements.tanggalInput.value = savedDisplayDate;
                }
                
                this.elements.tanggalContainer.classList.remove('d-none');
                this.elements.pilihBulanAlert.classList.add('d-none');
                if (this.elements.pilihTanggalAlert) {
                    this.elements.pilihTanggalAlert.classList.add('d-none');
                }
                if (this.elements.absensiTableContainer) {
                    this.elements.absensiTableContainer.classList.remove('d-none');
                }
            },

            handleMonthChange() {
                const selectedMonth = this.elements.bulanSelect.value;
                
                if (!selectedMonth) {
                    this.resetForm();
                    return;
                }

                if (!this.validateSelectedMonth(selectedMonth)) {
                    this.elements.bulanSelect.value = '';
                    return;
                }

                this.updateUIForMonthSelection(selectedMonth);
                this.generateDateButtons(selectedMonth);
            },

            validateSelectedMonth(selectedMonth) {
                const today = new Date();
                const selectedDate = new Date(today.getFullYear(), this.monthNames[selectedMonth]);
                
                if (selectedDate > today) {
                    this.showAlert('Data Tidak Tersedia', 'Data presensi untuk bulan yang dipilih belum tersedia');
                    return false;
                }
                return true;
            },

            updateUIForMonthSelection(selectedMonth) {
                this.elements.pilihBulanAlert.classList.add('d-none');
                this.elements.tanggalContainer.classList.remove('d-none');
                this.elements.absensiTableContainer.classList.add('d-none');
                
                if (!localStorage.getItem('displayDate')) {
                    this.elements.tanggalInput.value = '';
                }
            },

            generateDateButtons(selectedMonth) {
                this.elements.tanggalButtons.innerHTML = '';
                const year = new Date().getFullYear();
                const daysInMonth = new Date(year, this.monthNames[selectedMonth] + 1, 0).getDate();

                for (let day = 1; day <= daysInMonth; day++) {
                    const button = this.createDateButton(day);
                    this.elements.tanggalButtons.appendChild(button);
                }
            },

            createDateButton(day) {
                const button = document.createElement('button');
                button.className = 'btn btn-success';
                button.textContent = day;
                button.onclick = () => this.handleDateSelection(day);
                return button;
            },

            handleDateSelection(day) {
                const selectedMonth = this.elements.bulanSelect.value;
                if (!selectedMonth) {
                    this.showAlert('Perhatian', 'Silakan pilih bulan terlebih dahulu');
                    return;
                }

                const selectedDate = this.createDate(day, selectedMonth);
                if (!this.validateSelectedDate(selectedDate)) {
                    return;
                }

                this.updateFormWithSelectedDate(day, selectedMonth, selectedDate);
                this.submitForm(selectedDate);
            },

            createDate(day, month) {
                const year = new Date().getFullYear();
                return new Date(year, this.monthNames[month], day);
            },

            validateSelectedDate(date) {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                if (date > today) {
                    this.showAlert('Data Tidak Tersedia', 'Data presensi untuk tanggal yang dipilih belum tersedia');
                    return false;
                }
                return true;
            },

            updateFormWithSelectedDate(day, month, date) {
                const displayDate = `${this.dayNames[date.getDay()]}, ${day} ${month} ${date.getFullYear()}`;
                this.elements.tanggalInput.value = displayDate;
                
                localStorage.setItem('selectedBulan', month);
                localStorage.setItem('selectedTanggal', day);
                localStorage.setItem('displayDate', displayDate);
            },

            submitForm(date) {
                const formattedDate = this.formatDate(date);
                const form = this.createSubmitForm(formattedDate);
                form.submit();
            },

            formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            },

            createSubmitForm(formattedDate) {
                const form = document.createElement('form');
                form.method = 'GET';
                form.action = '{{ $routeName }}';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'tanggal';
                input.value = formattedDate;

                form.appendChild(input);
                document.body.appendChild(form);
                return form;
            },

            showAlert(title, text) {
                Swal.fire({
                    icon: 'warning',
                    title: title,
                    text: text,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        };

        document.addEventListener('DOMContentLoaded', () => AttendanceManager.init());
    </script>
    @endpush
</x-admin-layout>