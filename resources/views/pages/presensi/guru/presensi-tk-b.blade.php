<x-layout-presensi>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Murid TK A</h1>
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
                    @foreach (['Aisyah', 'Bagas', 'Bima', 'Dina', 'Fajar', 'Laras', 'Nayla', 'Putri', 'Salsabila', 'Zidan'] as $index => $murid)
                    <tr data-student-id="{{ $index }}">
                        <td class="text-center">{{ $murid }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-link p-0 check-btn" data-status="hadir"><i class="fas fa-check-circle" style="color: #4caf50;"></i></button>
                            <button class="btn btn-link p-0 ms-2 times-btn" data-status="tidak_hadir"><i class="fas fa-times-circle" style="color: #9e9e9e;"></i></button>
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
        </div>
    </div>
    <script>
        let attendanceData = {};
        let isSaved = false;

        // Inisialisasi data awal dengan status 'hadir' untuk semua siswa
        document.querySelectorAll('tr[data-student-id]').forEach(row => {
            const studentId = row.dataset.studentId;
            attendanceData[studentId] = {
                status: 'hadir',
                keterangan: ''
            };
        });

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

        document.querySelectorAll('.keterangan-input').forEach(input => {
            input.addEventListener('input', function() {
                const row = this.closest('tr');
                const studentId = row.dataset.studentId;
                
                if (attendanceData[studentId]) {
                    attendanceData[studentId].keterangan = this.value;
                }
            });
        });

        document.getElementById('save-btn').addEventListener('click', function() {
            console.log('Data yang akan dikirim ke server:', attendanceData);
            
            this.classList.add('d-none');
            document.getElementById('edit-btn').classList.remove('d-none');
            
            document.querySelectorAll('.keterangan-input').forEach(input => {
                input.disabled = true;
            });

            document.querySelectorAll('.check-btn, .times-btn').forEach(button => {
                button.disabled = true;
            });
        });

        document.getElementById('edit-btn').addEventListener('click', function() {
            this.classList.add('d-none');
            document.getElementById('save-btn').classList.remove('d-none');
            
            document.querySelectorAll('.keterangan-input').forEach(input => {
                input.disabled = false;
            });

            document.querySelectorAll('.check-btn, .times-btn').forEach(button => {
                button.disabled = false;
            });
        });
    </script>
</x-layout-presensi>