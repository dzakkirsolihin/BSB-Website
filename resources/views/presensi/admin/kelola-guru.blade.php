<x-layout-admin>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Akun Guru</h1>
        </div>

        @php
            $dataGuru = [
                ['id' => 1, 'name' => 'Ema Kusmiati', 'nip' => '123456', 'class_role' => null, 'password' => 'password123'],
                ['id' => 2, 'name' => 'Nenur Dahyati', 'nip' => '234567', 'class_role' => 'daycare', 'password' => 'password234'],
                ['id' => 3, 'name' => 'Ade Suparman', 'nip' => '345678', 'class_role' => 'tk-a', 'password' => 'password345'],
                ['id' => 4, 'name' => 'Euis Kartika', 'nip' => '456789', 'class_role' => 'tk-b', 'password' => 'password456'],
                ['id' => 5, 'name' => 'Titin Sumarni', 'nip' => '567890', 'class_role' => 'bestari', 'password' => 'password567'],
                ['id' => 6, 'name' => 'Suci Pebrianti', 'nip' => '678901', 'class_role' => null, 'password' => 'password678'],
                ['id' => 7, 'name' => 'Dea Rizki Shifany', 'nip' => '789012', 'class_role' => null, 'password' => 'password789'],
            ];
        @endphp

        <div class="table-responsive">
            <table class="table custom-table">
                <thead class="bg-primary-custom text-white">
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Role Kelas</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataGuru as $guru)
                    <tr class="align-middle" data-guru-id="{{ $guru['id'] }}">
                        <td class="text-center">{{ $guru['name'] }}</td>
                        <td class="text-center">
                            {{ $guru['class_role'] ? strtoupper(ucfirst(str_replace('-', ' ', $guru['class_role']))) : 'Kelas belum ditentukan' }}
                        </td>                        
                        <td class="text-center">{{ $guru['nip'] }}</td>
                        <td class="text-center">
                            <span id="password-{{ $guru['id'] }}" class="password-text" data-password="{{ $guru['password'] }}">******</span>
                            <button type="button" class="btn btn-link p-0 view-password-btn" data-guru-id="{{ $guru['id'] }}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td class="d-flex justify-content-center gap-2">
                            <button type="button" 
                                class="btn btn-link p-0 edit-btn" 
                                {{-- data-bs-toggle="modal"
                                data-bs-target="#editGuruModal" --}}
                                data-guru-id="{{ $guru['id'] }}"
                                data-guru-name="{{ $guru['name'] }}"
                                data-guru-nip="{{ $guru['nip'] }}"
                                data-guru-role="{{ $guru['class_role'] }}"
                                data-guru-password="{{ $guru['password'] }}">
                                <i class="fas fa-edit text-success"></i>
                            </button>
                            <button type="button" class="btn btn-link p-0 delete-btn" data-guru-id="{{ $guru['id'] }}">
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGuruModalLabel">Edit Akun Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editGuruForm">
                        <input type="hidden" id="editGuruId">
                        <div class="mb-3">
                            <label for="editNama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="editNama" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNip" class="form-label">NIP:</label>
                            <input type="text" class="form-control" id="editNip" required>
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="editPassword" class="form-label">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="editPassword" value="******">
                                <button type="button" class="btn btn-outline-secondary toggle-password" id="toggleEditPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role Kelas:</label>
                            <select class="form-control" id="editRole" required>
                                <option value="" disabled>Pilih Role Kelas...</option>
                                <option value="daycare">Daycare</option>
                                <option value="tk-a">TK A</option>
                                <option value="tk-b">TK B</option>
                                <option value="bestari">Bestari</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeEditModalBtn">Batal</button>
                    <button type="button" class="btn btn-primary" id="simpanEditGuruBtn">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi modal Bootstrap
    const editModalEl = document.getElementById('editGuruModal');
    const editModal = new bootstrap.Modal(editModalEl);
    
    let originalFormData = {};

    function hasFormChanged() {
        const currentNama = document.getElementById('editNama').value;
        const currentNip = document.getElementById('editNip').value;
        const currentRole = document.getElementById('editRole').value;
        const currentPassword = document.getElementById('editPassword').value;
        
        return currentNama !== originalFormData.nama ||
            currentNip !== originalFormData.nip ||
            currentRole !== originalFormData.role ||
            (currentPassword !== '******' && currentPassword !== originalFormData.password);
    }

    function storeOriginalFormData() {
        originalFormData = {
            nama: document.getElementById('editNama').value,
            nip: document.getElementById('editNip').value,
            role: document.getElementById('editRole').value,
            password: document.getElementById('editPassword').value
        };
    }

    function cleanupModal() {
        document.getElementById('editGuruForm').reset();
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    }

    // Edit button handler
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const guruId = this.dataset.guruId;
            const guruName = this.dataset.guruName;
            const guruNip = this.dataset.guruNip;
            const guruRole = this.dataset.guruRole;
            
            document.getElementById('editGuruId').value = guruId;
            document.getElementById('editNama').value = guruName;
            document.getElementById('editNip').value = guruNip;
            document.getElementById('editRole').value = guruRole || '';
            document.getElementById('editPassword').value = '******';

            storeOriginalFormData();
            editModal.show();
        });
    });

    // Cancel and close handlers
    ['#closeEditModalBtn', '.btn-close'].forEach(selector => {
        document.querySelector(selector).addEventListener('click', function(e) {
            e.preventDefault();
            if (hasFormChanged()) {
                if (confirm('Data yang Anda ubah belum tersimpan. Apakah Anda yakin ingin membatalkan?')) {
                    editModal.hide();
                    cleanupModal();
                }
            } else {
                editModal.hide();
                cleanupModal();
            }
        });
    });

    // Handle modal hidden event
    editModalEl.addEventListener('hidden.bs.modal', function () {
        cleanupModal();
    });

    // Save button handler
    document.getElementById('simpanEditGuruBtn').addEventListener('click', async function() {
        const form = document.getElementById('editGuruForm');
        if (form.checkValidity()) {
            const guruId = document.getElementById('editGuruId').value;
            const formData = {
                id: guruId,
                name: document.getElementById('editNama').value,
                nip: document.getElementById('editNip').value,
                password: document.getElementById('editPassword').value,
                class_role: document.getElementById('editRole').value
            };

            try {
                // Update row in table
                const row = document.querySelector(`tr[data-guru-id="${guruId}"]`);
                row.querySelector('td:nth-child(1)').textContent = formData.name;
                row.querySelector('td:nth-child(2)').textContent = 
                    formData.class_role ? 
                    formData.class_role.toUpperCase().replace('-', ' ') : 
                    'Kelas belum ditentukan';
                row.querySelector('td:nth-child(3)').textContent = formData.nip;

                // Update password field
                const passwordField = row.querySelector('.password-text');
                passwordField.dataset.password = formData.password === '******' ? 
                    originalFormData.password : formData.password;
                passwordField.textContent = '******';

                // Update button data attributes
                const editBtn = row.querySelector('.edit-btn');
                editBtn.dataset.guruName = formData.name;
                editBtn.dataset.guruNip = formData.nip;
                editBtn.dataset.guruRole = formData.class_role;
                editBtn.dataset.guruPassword = passwordField.dataset.password;

                alert('Data guru berhasil diperbarui');
                editModal.hide();
                cleanupModal();

            } catch (error) {
                console.error('Error:', error);
                alert('Gagal memperbarui data guru');
            }
        } else {
            form.reportValidity();
        }
    });

    // Password visibility toggle
    document.getElementById('toggleEditPassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('editPassword');
        if (passwordInput.value === '******') {
            const guruPassword = document.querySelector(
                `.edit-btn[data-guru-id="${document.getElementById('editGuruId').value}"]`
            ).dataset.guruPassword;
            passwordInput.value = guruPassword;
        }
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // View Password Toggle in Table
    document.querySelectorAll('.view-password-btn').forEach(button => {
        button.addEventListener('click', function() {
            const guruId = this.dataset.guruId;
            const passwordElement = document.getElementById(`password-${guruId}`);
            const isPasswordHidden = passwordElement.textContent === '******';
            const currentPassword = passwordElement.dataset.password;

            passwordElement.textContent = isPasswordHidden ? currentPassword : '******';
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });

    // Delete button handler
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', async function() {
            const guruId = this.dataset.guruId;
            if (confirm('Apakah Anda yakin ingin menghapus akun guru ini?')) {
                try {
                    this.closest('tr').remove();
                    alert('Akun guru berhasil dihapus');
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus data');
                }
            }
        });
    });
});
    </script>
</x-layout-admin>
