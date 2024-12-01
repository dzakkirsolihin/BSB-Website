<x-layout-presensi>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Daycare</h1>
        
        @php
            // Data dummy untuk presensi daycare
            $daycarePresensi = [
                ['name' => 'Aisyah', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Bagas', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Bima', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Dina', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Fajar', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Laras', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Nayla', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Putri', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Salsabila', 'signInTime' => null, 'signOutTime' => null],
                ['name' => 'Zidan', 'signInTime' => null, 'signOutTime' => null],
            ];
        @endphp

        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daycarePresensi as $index => $presensi)
                    <tr>
                        <td class="text-center">{{ $presensi['name'] }}</td>
                        <td class="text-center">
                            <button class="btn btn-link p-0 text-primary-custom" id="signIn-{{ $index }}" onclick="signIn({{ $index }})"><i class="fas fa-sign-in-alt"></i></button>
                            <button class="btn btn-link p-0 ms-2 text-primary-custom" id="signOut-{{ $index }}" onclick="signOut({{ $index }})"><i class="fas fa-sign-out-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary-custom text-light" onclick="saveAttendance()">Simpan Kehadiran</button>
        </div>
    </main>

    <script>
        const attendanceData = [];

        // Fungsi untuk menangkap data kehadiran saat Sign In
        function signIn(index) {
            const now = new Date();
            const date = now.toLocaleDateString(); // Format hari/tanggal/bulan
            const time = now.toLocaleTimeString(); // Format jam

            // Simpan data jam datang
            attendanceData[index] = {
                name: `Murid ${index}`,
                signInTime: `${date} ${time}`,
                signOutTime: null // Belum keluar
            };

            // Ubah warna tombol menjadi abu-abu
            document.getElementById(`signIn-${index}`).style.color = 'gray';
            document.getElementById(`signIn-${index}`).disabled = true; // Nonaktifkan tombol setelah diklik
        }

        // Fungsi untuk menangkap data kehadiran saat Sign Out
        function signOut(index) {
            const now = new Date();
            const date = now.toLocaleDateString(); // Format hari/tanggal/bulan
            const time = now.toLocaleTimeString(); // Format jam

            // Simpan data jam pulang
            if (attendanceData[index]) {
                attendanceData[index].signOutTime = `${date} ${time}`;
            }

            // Ubah warna tombol menjadi abu-abu
            document.getElementById(`signOut-${index}`).style.color = 'gray';
            document.getElementById(`signOut-${index}`).disabled = true; // Nonaktifkan tombol setelah diklik
        }

        // Fungsi untuk menyimpan data ke database
        function saveAttendance() {
            // Kirim data ke server
            fetch('/api/presensi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(attendanceData),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data berhasil disimpan:', data);
                // Tindakan setelah berhasil
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
</x-layout-presensi>