<x-admin-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Murid DayCare</h1>
        </div>

        <div class="table-responsive">
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
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMuridDaycare as $murid)
                        <tr>
                            <td class="text-center">{{ $murid->nama_siswa }}</td>
                            <td class="text-center">{{ $murid->jk }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <button class="btn btn-link p-0"><i class="fas fa-edit text-success"></i></button>
                                <button class="btn btn-link p-0 delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteMuridModal" data-nis="{{ $murid->nis }}">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center my-4">
            <button class="btn button btn-mg mb-4">DAFTAR</button>
            <button class="btn btn-danger btn-mg mb-4 delete-all-btn" data-bs-toggle="modal" data-bs-target="#deleteAllMuridModal">HAPUS SEMUA MURID</button>
        </div>

        <!-- Modal Edit Guru -->
        <div class="modal fade" id="editMuridModal" tabindex="-1" aria-labelledby="editGuruModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMuridModalLabel">Edit Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editMuridForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="murid_id">
                            <div class="mb-3">
                                <label for="noInduk" class="form-label">No Induk</label>
                                <input type="text" class="form-control" id="noInduk" name="noInduk" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_murid" class="form-label">Nama Murid</label>
                                <input type="text" class="form-control" id="nama_murid" name="nama_murid"
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
                                <label for="kelas_id" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas_id" name="kelas_id">
                                    <option value="">Kosong</option> <!-- Option for null value -->
                                    @foreach ($dataKelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
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

        <!-- Modal Hapus Murid -->
        <div class="modal fade" id="deleteMuridModal" tabindex="-1" aria-labelledby="deleteMuridModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteMuridModalLabel">Hapus Data Murid</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data murid ini? Masukkan password admin untuk konfirmasi.</p>
                        <form id="deleteMuridForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="nis" id="murid_nis">
                            <div class="mb-3">
                                <label for="admin_password" class="form-label">Password Admin</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password"
                                    placeholder="Silahkan masukkan password admin" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" form="deleteMuridForm">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Semua Murid -->
        <div class="modal fade" id="deleteAllMuridModal" tabindex="-1" aria-labelledby="deleteAllMuridModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAllMuridModalLabel">Hapus Semua Data Murid</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus semua data murid di kelas ini? Tindakan ini tidak dapat diurungkan. Masukkan password admin untuk konfirmasi.</p>
                        <form id="deleteAllMuridForm" method="POST" action="{{ route('murid.destroyAll', ['kelas_id' => 1]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="kelas_id" id="kelas_id" value="1">
                            <div class="mb-3">
                                <label for="admin_password" class="form-label">Password Admin</label>
                                <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Silahkan masukkan password admin" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" form="deleteAllMuridForm">Hapus Semua</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <x-tabel-kelola-murid :students="$students" kelas="Daycare" />
        <x-edit-murid-modal kelas="Daycare" />
        <x-script-kelola-murid kelas="Daycare" /> --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const editButtons = document.querySelectorAll('.edit-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get data from button attributes
                    const nik = this.dataset.nip; // Ganti id dengan nip
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
                    const nis = this.dataset.nis;
                    document.getElementById('murid_nis').value = nis;
                    const form = document.getElementById('deleteMuridForm');
                    form.action = `/muridTkBestari/${nis}/delete`; // Update action URL
                });
            });

            const deleteAllButton = document.querySelector('.delete-all-btn');
            deleteAllButton.addEventListener('click', function() {
                const kelas_id = 1; // ID kelas TK A
                document.getElementById('kelas_id').value = kelas_id;
                const form = document.getElementById('deleteAllMuridForm');
                form.action = `/muridTkBestari/${kelas_id}/deleteAll`; // Update action URL
            });
        });
    </script>
</x-admin-layout>
