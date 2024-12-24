<x-admin-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Akun Guru</h1>
        </div>

        <div class="table-responsive row d-flex justify-content-center">
            @if ($errors->has('admin_password'))
                <div class="alert alert-danger">
                    {{ $errors->first('admin_password') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
            @endif
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
                        <tr class="align-middle" data-guru-id="{{ $guru->id }}">
                            <td class="text-center">{{ $guru->nama_guru }}</td>
                            <td class="text-center">
                                {{ $guru->kelas->nama_kelas ?? 'Kelas belum ditentukan' }}
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-link p-0 edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#editGuruModal" data-id="{{ $guru->id }}"
                                    data-nama="{{ $guru->nama_guru }}" data-nip="{{ $guru->nip }}"
                                    data-email="{{ $guru->user->email }}" data-telp="{{ $guru->telp }}"
                                    data-alamat="{{ $guru->alamat }}" data-jk="{{ $guru->jk }}"
                                    data-kelas="{{ $guru->kelas_id }}">
                                    <i class="fas fa-edit text-success"></i>
                                </button>
                                @if ($guru->user->role === 'Admin')
                                    <button class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#adminErrorModal">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                @else
                                    <button class="btn btn-link p-0 delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#deleteGuruModal" data-nip="{{ $guru->nip }}">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                @endif

                                <!-- Modal Hapus Guru dengan Role ='Admin' -->
                                <div class="modal fade" id="adminErrorModal" tabindex="-1" aria-labelledby="adminErrorModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Guru</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    {{ 'Akun dengan role Admin tidak dapat dihapus.'}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('resources/profile/create') }}" class="btn btn-primary-custom text-white">Tambah Akun
                Guru</a>
        </div>

        <!-- Modal Edit Guru -->
        <div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGuruModalLabel">Edit Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editGuruForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="guru_id">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="contoh@email.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip"
                                    placeholder="Isi NIP disini" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_guru" class="form-label">Nama Guru</label>
                                <input type="text" class="form-control" id="nama_guru" name="nama_guru"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="laki_laki"
                                        value="L" required>
                                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan"
                                        value="P" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp"
                                    placeholder="08123456XXXX" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Jalan Contoh Dago No. 123" rows="3"
                                    required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas_id" name="kelas_id">
                                    <option value="">Kosong</option> <!-- Option for null value -->
                                    @foreach ($dataKelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="admin_password" class="form-label">Password Admin</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password"
                                    placeholder="Kosongkan jika tidak ingin mengubah password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" form="editGuruForm">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Guru -->
        <div class="modal fade" id="deleteGuruModal" tabindex="-1" aria-labelledby="deleteGuruModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteGuruModalLabel">Hapus Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data guru ini? Masukkan password admin untuk konfirmasi.</p>
                        <form id="deleteGuruForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="nip" id="guru_nip">
                            <div class="mb-3">
                                <label for="admin_password" class="form-label">Password Admin</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password"
                                    required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" form="deleteGuruForm">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get data from button attributes
                    const nip = this.dataset.nip; // Ganti id dengan nip
                    const nama = this.dataset.nama;
                    const email = this.dataset.email;
                    const telp = this.dataset.telp;
                    const alamat = this.dataset.alamat;
                    const jk = this.dataset.jk;
                    const kelas = this.dataset.kelas;

                    // Populate form fields
                    document.getElementById('nama_guru').value = nama;
                    document.getElementById('nip').value = nip;
                    document.getElementById('email').value = email;
                    document.getElementById('telp').value = telp;
                    document.getElementById('alamat').value = alamat;

                    // Set selected kelas
                    const kelasSelect = document.getElementById('kelas_id');
                    if (kelasSelect) {
                        kelasSelect.value = kelas;
                    }

                    // Handle radio buttons for gender
                    if (jk === 'L') {
                        document.getElementById('laki_laki').checked = true;
                    } else if (jk === 'P') {
                        document.getElementById('perempuan').checked = true;
                    }

                    // Add form action with the correct NIP
                    const form = document.getElementById('editGuruForm');
                    form.action = `/guru/${nip}/update`; // Ganti id dengan nip
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nip = this.dataset.nip;
                    document.getElementById('guru_nip').value = nip;
                    const form = document.getElementById('deleteGuruForm');
                    form.action = `/guru/${nip}/delete`; // Update action URL
                });
            });
        });
    </script>
</x-admin-layout>
