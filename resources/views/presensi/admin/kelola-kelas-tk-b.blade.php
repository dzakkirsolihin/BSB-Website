<x-admin-layout>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="text-center inter-font text-primary-custom mb-5">Kelola Murid Kelas TK B</h1>
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
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMuridTkB as $murid)
                        <tr>
                            <td class="text-center">{{ $murid->nama_siswa }}</td>
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

        <!-- Modal Hapus Murid -->
        <div class="modal fade" id="deleteMuridModal" tabindex="-1" aria-labelledby="deleteMuridModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteMuridModalLabel">Hapus Data Murid</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data murid ini? Masukkan password admin untuk konfirmasi.</p>
                        <form id="deleteMuridForm" method="POST" action="MuridController@destroy">
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
                        <form id="deleteAllMuridForm" method="POST" action="{{ route('murid.destroyAll', ['kelas_id' => 3]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="kelas_id" id="kelas_id" value="3"> <!-- Pastikan ID kelas sesuai -->
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
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nis = this.dataset.nis;
                    document.getElementById('murid_nis').value = nis;
                    const form = document.getElementById('deleteMuridForm');
                    form.action = `/muridTkBestari/${nis}/delete`; // Update action URL
                });
            });

            const deleteAllButton = document.querySelector('.delete-all-btn'); // Get the button element
            deleteAllButton.addEventListener('click', function() {
                const kelas_id = 3; // Ganti dengan ID kelas yang sesuai
                document.getElementById('kelas_id').value = kelas_id; // Set kelas_id
                const form = document.getElementById('deleteAllMuridForm');
                form.action = `/muridTkBestari/${kelas_id}/deleteAll`; // Update action URL
            });
        });
    </script>
</x-admin-layout>
