<x-presensi-layout>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Daycare</h1>

        @php
            // Data dummy - nanti akan diganti dengan data dari database
            $daycarePresensi = [
                ['id' => 1, 'name' => 'Aisyah', 'class' => 'Daycare'],
                ['id' => 2, 'name' => 'Bagas', 'class' => 'Daycare'],
                ['id' => 3, 'name' => 'Bima', 'class' => 'Daycare'],
                ['id' => 4, 'name' => 'Dina', 'class' => 'Daycare'],
                ['id' => 5, 'name' => 'Fajar', 'class' => 'Daycare'],
                ['id' => 6, 'name' => 'Laras', 'class' => 'Daycare'],
                ['id' => 7, 'name' => 'Nayla', 'class' => 'Daycare'],
                ['id' => 8, 'name' => 'Putri', 'class' => 'Daycare'],
                ['id' => 9, 'name' => 'Salsabila', 'class' => 'Daycare'],
                ['id' => 10, 'name' => 'Zidan', 'class' => 'Daycare'],
            ];
        @endphp

        <div class="table-responsive">
            <table class="table custom-table" id="attendance-table">
                <thead class="bg-primary-custom text-white">
                    <tr>
                        <th class="text-center col-3">Nama</th>
                        <th class="text-center col-3">Aksi</th>
                        <th class="text-center col-6">Pengantar/Penjemput</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daycarePresensi as $student)
                    <tr data-student-id="{{ $student['id'] }}" class="align-middle">
                        <td class="text-center">{{ $student['name'] }}</td>
                        <td class="text-center">
                            <button class="btn btn-link p-0 text-primary-custom" id="signIn-{{ $student['id'] }}" onclick="handleSignIn({{ $student['id'] }})">
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                            <button class="btn btn-link p-0 ms-2 text-primary-custom" id="signOut-{{ $student['id'] }}" onclick="handleSignOut({{ $student['id'] }})">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </td>
                        <td>
                            <!-- Form Pengantar -->
                            <div class="row g-2 d-none" id="pengantar-form-{{ $student['id'] }}">
                                <div class="col-12">
                                    <select class="form-select form-select-sm pengantar-select" id="pengantar-{{ $student['id'] }}">
                                        <option value="">Pilih Pengantar...</option>
                                        <option value="ayah">Ayah</option>
                                        <option value="ibu">Ibu</option>
                                        <option value="keluarga">Keluarga</option>
                                    </select>
                                    <input type="text"
                                        class="form-control form-control-sm mt-1 pengantar-detail d-none"
                                        id="pengantar-detail-{{ $student['id'] }}"
                                        placeholder="Siapa?">
                                    <button class="btn btn-sm btn-primary mt-1 w-100" onclick="submitPengantar({{ $student['id'] }})">
                                        Konfirmasi Kedatangan
                                    </button>
                                </div>
                            </div>

                            <!-- Form Penjemput -->
                            <div class="row g-2 d-none" id="penjemput-form-{{ $student['id'] }}">
                                <div class="col-12">
                                    <select class="form-select form-select-sm penjemput-select" id="penjemput-{{ $student['id'] }}">
                                        <option value="">Pilih Penjemput...</option>
                                        <option value="ayah">Ayah</option>
                                        <option value="ibu">Ibu</option>
                                        <option value="keluarga">Keluarga</option>
                                    </select>
                                    <input type="text"
                                        class="form-control form-control-sm mt-1 penjemput-detail d-none"
                                        id="penjemput-detail-{{ $student['id'] }}"
                                        placeholder="Siapa?">
                                    <button class="btn btn-sm btn-primary mt-1 w-100" onclick="submitPenjemput({{ $student['id'] }})">
                                        Konfirmasi Kepulangan
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <script>
        const attendanceData = {};

        // Inisialisasi data awal dengan data dari PHP
        @foreach ($daycarePresensi as $student)
            attendanceData[{{ $student['id'] }}] = {
                student_id: {{ $student['id'] }},
                name: "{{ $student['name'] }}",
                class: "{{ $student['class'] }}",
                date: new Date().toISOString().split('T')[0],
                signInTime: null,
                signOutTime: null,
                pengantar: '',
                pengantarDetail: '',
                penjemput: '',
                penjemputDetail: ''
            };
        @endforeach

        function handleSignIn(studentId) {
            // Sembunyikan form penjemput jika terbuka
            document.getElementById(`penjemput-form-${studentId}`).classList.add('d-none');
            document.getElementById(`signOut-${studentId}`).disabled = false;

            // Tampilkan form pengantar
            document.getElementById(`pengantar-form-${studentId}`).classList.remove('d-none');
            document.getElementById(`signIn-${studentId}`).disabled = true;
        }

        function handleSignOut(studentId) {
            // Sembunyikan form pengantar jika terbuka
            document.getElementById(`pengantar-form-${studentId}`).classList.add('d-none');
            document.getElementById(`signIn-${studentId}`).disabled = false;

            // Tampilkan form penjemput
            document.getElementById(`penjemput-form-${studentId}`).classList.remove('d-none');
            document.getElementById(`signOut-${studentId}`).disabled = true;
        }

        function submitPengantar(studentId) {
            const pengantar = document.getElementById(`pengantar-${studentId}`).value;
            const pengantarDetail = document.getElementById(`pengantar-detail-${studentId}`).value;

            if (!pengantar) {
                alert('Silakan pilih pengantar terlebih dahulu!');
                return;
            }

            if (pengantar === 'keluarga' && !pengantarDetail) {
                alert('Silakan isi detail pengantar!');
                return;
            }

            const now = new Date();
            attendanceData[studentId].signInTime = now.toLocaleTimeString();
            attendanceData[studentId].pengantar = pengantar;
            attendanceData[studentId].pengantarDetail = pengantarDetail;

            // Sembunyikan form pengantar
            document.getElementById(`pengantar-form-${studentId}`).classList.add('d-none');

            // Nonaktifkan tombol signIn secara permanen
            const signInBtn = document.getElementById(`signIn-${studentId}`);
            signInBtn.disabled = true;
            signInBtn.style.color = 'gray';

            // Aktifkan tombol signOut
            document.getElementById(`signOut-${studentId}`).disabled = false;

            console.log('Data kedatangan:', attendanceData[studentId]);
        }

        function submitPenjemput(studentId) {
            const penjemput = document.getElementById(`penjemput-${studentId}`).value;
            const penjemputDetail = document.getElementById(`penjemput-detail-${studentId}`).value;

            if (!penjemput) {
                alert('Silakan pilih penjemput terlebih dahulu!');
                return;
            }

            if (penjemput === 'keluarga' && !penjemputDetail) {
                alert('Silakan isi detail penjemput!');
                return;
            }

            const now = new Date();
            attendanceData[studentId].signOutTime = now.toLocaleTimeString();
            attendanceData[studentId].penjemput = penjemput;
            attendanceData[studentId].penjemputDetail = penjemputDetail;

            // Sembunyikan form penjemput
            document.getElementById(`penjemput-form-${studentId}`).classList.add('d-none');

            // Nonaktifkan tombol signOut secara permanen
            const signOutBtn = document.getElementById(`signOut-${studentId}`);
            signOutBtn.disabled = true;
            signOutBtn.style.color = 'gray';

            // Tombol signIn tetap nonaktif
            document.getElementById(`signIn-${studentId}`).disabled = true;

            console.log('Data kepulangan:', attendanceData[studentId]);
        }

        // Event listeners untuk dropdown
        document.querySelectorAll('.pengantar-select, .penjemput-select').forEach(select => {
            select.addEventListener('change', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;
                const isSignIn = this.classList.contains('pengantar-select');
                const detailInput = row.querySelector(isSignIn ? '.pengantar-detail' : '.penjemput-detail');

                if (this.value === 'keluarga') {
                    detailInput.classList.remove('d-none');
                } else {
                    detailInput.classList.add('d-none');
                    detailInput.value = '';
                }
            });
        });
    </script>

    <style>
        .custom-table thead {
            background-color: var(--bs-primary);
        }

        .custom-table tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .custom-table tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</x-presensi-layout>

{{-- // Fungsi untuk mengecek waktu operasional
        function checkOperationalHours() {
            const now = new Date();
            const hour = now.getHours();

            // Jam operasional daycare (contoh: 07:00 - 16:00)
            if (hour >= 7 && hour < 12) {
                return 'signIn'; // Periode SignIn
            } else if (hour >= 12 && hour <= 16) {
                return 'signOut'; // Periode SignOut
            }
            return 'closed'; // Di luar jam operasional
        }
        function handleSignIn(studentId) {
            if (checkOperationalHours() === 'signIn') {
                // Tampilkan form pengantar
                document.getElementById(`pengantar-form-${studentId}`).classList.remove('d-none');
                // Nonaktifkan tombol signIn sementara
                document.getElementById(`signIn-${studentId}`).disabled = true;
            } else {
                alert('Maaf, saat ini bukan waktu untuk presensi kedatangan.');
            }
        } --}}
