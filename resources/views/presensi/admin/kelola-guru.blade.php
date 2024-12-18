<x-admin-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Akun Guru</h1>
        </div>

        @php
            // Data dummy - nanti akan diganti dengan data dari database
            $dataGuru = [
                ['id' => 1, 'name' => 'Ema Kusmiati', 'nip' => '123456', 'class_role' => null],
                ['id' => 2, 'name' => 'Nenur Dahyati', 'nip' => '234567', 'class_role' => 'daycare'],
                ['id' => 3, 'name' => 'Ade Suparman', 'nip' => '345678', 'class_role' => 'tk-a'],
                ['id' => 4, 'name' => 'Euis Kartika', 'nip' => '456789', 'class_role' => 'tk-b'],
                ['id' => 5, 'name' => 'Titin Sumarni', 'nip' => '567890', 'class_role' => 'bestari'],
                ['id' => 6, 'name' => 'Suci Pebrianti', 'nip' => '678901', 'class_role' => null],
                ['id' => 7, 'name' => 'Dea Rizki Shifany', 'nip' => '789012', 'class_role' => null],
            ];
        @endphp

        <div class="table-responsive">
            <table class="table custom-table">
                <thead class="bg-primary-custom text-white">
                    <tr>
                        <th class="text-center col-4">Nama</th>
                        <th class="text-center col-5">Role Kelas</th>
                        <th class="text-center col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataGuru as $guru)
                    <tr class="align-middle" data-guru-id="{{ $guru['id'] }}">
                        <td class="text-center">{{ $guru['name'] }}</td>
                        <td class="text-center">
                            {{ $guru['class_role'] ?? 'Kelas belum ditentukan' }}
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="#"
                                class="btn btn-link p-0 edit-btn"
                                data-guru-id="{{ $guru['id'] }}"
                                data-guru-name="{{ $guru['name'] }}"
                                data-guru-nip="{{ $guru['nip'] }}"
                                data-guru-role="{{ $guru['class_role'] }}">
                                <i class="fas fa-edit text-success"></i>
                            </a>
                            <button class="btn btn-link p-0 delete-btn" data-guru-id="{{ $guru['id'] }}">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('resources/profile/create') }}" class="btn btn-primary-custom text-white">Tambah Akun Guru</a>
        </div>
    </div>

    <!-- Pop-up Form for Edit -->
    <div id="editGuruModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Akun Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editGuruForm">
                        <div class="form-group">
                            <label for="editNama">Nama:</label>
                            <input type="text" class="form-control" id="editNama" required>
                        </div>
                        <div class="form-group">
                            <label for="editNip">NIP:</label>
                            <input type="text" class="form-control" id="editNip" required>
                        </div>
                        <div class="form-group">
                            <label for="editPassword">Password:</label>
                            <input type="password" class="form-control" id="editPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="editRole">Role Kelas:</label>
                            <select class="form-control" id="editRole" required>
                                <option value="" disabled selected>Pilih Role Kelas...</option>
                                <option value="daycare">Daycare</option>
                                <option value="tk-a">TK A</option>
                                <option value="tk-b">TK B</option>
                                <option value="bestari">Bestari</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="simpanEditGuruBtn">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script untuk menampilkan modal edit
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const guruId = this.dataset.guruId;
                const guruName = this.dataset.guruName;
                const guruNip = this.dataset.guruNip;
                const guruRole = this.dataset.guruRole;

                // Mengisi data ke dalam form
                document.getElementById('editNama').value = guruName;
                document.getElementById('editNip').value = guruNip;
                document.getElementById('editRole').value = guruRole;

                // Menampilkan modal
                $('#editGuruModal').modal('show');
            });
        });

        // Script untuk menyimpan data edit (saat ini hanya menampilkan alert)
        document.getElementById('simpanEditGuruBtn').addEventListener('click', function() {
            const nama = document.getElementById('editNama').value;
            const nip = document.getElementById('editNip').value;
            const password = document.getElementById('editPassword').value;
            const role = document.getElementById('editRole').value;

            // Lakukan penyimpanan data di sini (misalnya, kirim ke server)

            alert(`Akun guru diperbarui:\nNama: ${nama}\nNIP: ${nip}\nRole Kelas: ${role}`);
            $('#editGuruModal').modal('hide');
            document.getElementById('editGuruForm').reset(); // Reset form
        });

        // Script untuk menghapus akun guru
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const guruId = this.dataset.guruId;

                // Konfirmasi penghapusan
                if (confirm('Apakah Anda yakin ingin menghapus akun guru ini?')) {
                    // Lakukan penghapusan data di sini (misalnya, kirim ke server)
                    alert(`Akun guru dengan ID ${guruId} telah dihapus.`);
                    // Hapus baris dari tabel
                    this.closest('tr').remove();
                }
            });
        });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-admin-layout>
