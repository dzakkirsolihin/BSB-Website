<x-presensi-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Murid Kelas TK B</h1>
        </div>

        <div class="table-responsive">
            <table class="table custom-table" id="attendance-table">
                <thead>
                    <tr>
                        <th class="text-center col-5">Nama</th>
                        <th class="text-center col-3">Kehadiran</th>
                        <th class="text-center col-4">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMuridTkB as $murid)
                        <tr data-student-id="{{ $murid->no_induk }}">
                            <td class="text-center">{{ $murid->nama_siswa }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <button id="hadir" class="btn btn-link p-0 check-btn" data-status="hadir">
                                    <i class="fas fa-check-circle" style="color: #4caf50;"></i>
                                </button>
                                <button id="tidak_hadir" class="btn btn-link p-0 ms-2 times-btn" data-status="tidak_hadir">
                                    <i class="fas fa-times-circle" style="color: #9e9e9e;"></i>
                                </button>
                            </td>
                            <td class="text-center">
                                <input type="text"
                                    class="form-control form-control-sm mx-auto w-75 keterangan-input d-none"
                                    placeholder="Keterangan..."
                                    maxlength="50">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center gap-2 my-4">
            <button id="save-btn" class="btn btn-primary-custom text-light">SIMPAN</button>
            <button id="edit-btn" class="btn btn-primary-custom text-light d-none">EDIT</button>
            <button id="save-edit-btn" class="btn btn-warning text-light d-none">SIMPAN EDIT</button>
        </div>
    </div>

    <script>
        let attendanceData = {};

        // Initialize attendance data
        document.querySelectorAll('tr[data-student-id]').forEach(row => {
            const studentId = row.dataset.studentId;
            const checkBtn = row.querySelector('.check-btn i');
            const timesBtn = row.querySelector('.times-btn i');
            const keteranganInput = row.querySelector('.keterangan-input');

            @if($existingAttendance)
                // Get existing attendance data from database
                @foreach($dataMuridTkB as $murid)
                    if(studentId === '{{ $murid->no_induk }}') {
                        const attendance = {!! json_encode($murid->presensi()->whereDate('created_at', date('Y-m-d'))->first()) !!};
                        if(attendance) {
                            attendanceData[studentId] = {
                                status: attendance.kehadiran === 'H' ? 'hadir' : 'tidak_hadir',
                                keterangan: attendance.keterangan || ''
                            };

                            // Update button colors based on attendance
                            if(attendance.kehadiran === 'H') {
                                checkBtn.style.color = '#4caf50';
                                timesBtn.style.color = '#9e9e9e';
                                keteranganInput.classList.add('d-none');
                            } else {
                                checkBtn.style.color = '#9e9e9e';
                                timesBtn.style.color = '#f44336';
                                keteranganInput.classList.remove('d-none');
                                keteranganInput.value = attendance.keterangan || '';
                            }
                            return;
                        }
                    }
                @endforeach
            @endif

            // Default state if no existing attendance
            attendanceData[studentId] = {
                status: 'hadir',
                keterangan: ''
            };
        });

        // Handle present button click
        document.querySelectorAll('.check-btn').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;
                const keteranganInput = row.querySelector('.keterangan-input');

                this.querySelector('i').style.color = '#4caf50';
                this.nextElementSibling.querySelector('i').style.color = '#9e9e9e';
                keteranganInput.classList.add('d-none');

                attendanceData[studentId] = {
                    status: 'hadir',
                    keterangan: ''
                };
            });
        });

        // Handle absent button click
        document.querySelectorAll('.times-btn').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;
                const keteranganInput = row.querySelector('.keterangan-input');

                this.querySelector('i').style.color = '#f44336';
                this.previousElementSibling.querySelector('i').style.color = '#9e9e9e';
                keteranganInput.classList.remove('d-none');

                attendanceData[studentId] = {
                    status: 'tidak_hadir',
                    keterangan: keteranganInput.value
                };
            });
        });

        // Handle keterangan input
        document.querySelectorAll('.keterangan-input').forEach(input => {
            input.addEventListener('input', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;

                if (attendanceData[studentId]) {
                    attendanceData[studentId].keterangan = this.value;
                }
            });
        });

        // Handle save button
        document.getElementById('save-btn').addEventListener('click', async function() {
            try {
                const response = await fetch('/dashboard-guru/presensi-tk-bestari/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        attendance: attendanceData,
                        date: new Date().toISOString().split('T')[0]
                    })
                });

                const data = await response.json();

                if (data.status === 'success') {
                    this.classList.add('d-none');
                    document.getElementById('edit-btn').classList.remove('d-none');

                    // Disable all inputs
                    document.querySelectorAll('.keterangan-input').forEach(input => {
                        input.disabled = true;
                    });
                    document.querySelectorAll('.check-btn, .times-btn').forEach(button => {
                        button.disabled = true;
                    });

                    alert('Presensi berhasil disimpan!');
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });

        // Handle save edit button
        document.getElementById('save-edit-btn').addEventListener('click', async function() {
            try {
                const response = await fetch('/dashboard-guru/presensi-tk-bestari/update', {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        attendance: attendanceData,
                        date: new Date().toISOString().split('T')[0]
                    })
                });

                const data = await response.json();

                if (data.status === 'success') {
                    alert('Presensi berhasil diperbarui!');
                    location.reload(); // Reload the page to see updated data
                } else {
                    throw new Error(data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan: ' + error.message);
            }
        });

        // Handle edit button
        document.getElementById('edit-btn').addEventListener('click', function() {
            this.classList.add('d-none');
            document.getElementById('save-btn').classList.add('d-none');
            document.getElementById('save-edit-btn').classList.remove('d-none');

            // Enable all inputs
            document.querySelectorAll('.keterangan-input').forEach(input => {
                input.disabled = false;
            });
            document.querySelectorAll('.check-btn, .times-btn').forEach(button => {
                button.disabled = false;
            });
        });

        @if ($existingAttendance->isNotEmpty())
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('save-btn').classList.add('d-none');
                document.getElementById('edit-btn').classList.remove('d-none');

                document.querySelectorAll('.keterangan-input').forEach(input => {
                    input.disabled = true;
                });
                document.querySelectorAll('.check-btn, .times-btn').forEach(button => {
                    button.disabled = true;
                });
            });
        @endif
    </script>
</x-presensi-layout>
