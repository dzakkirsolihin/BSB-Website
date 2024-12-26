@props(['kelas_id', 'route'])

<div class="modal fade" id="deleteAllMuridModal" tabindex="-1" aria-labelledby="deleteAllMuridModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAllMuridModalLabel">Hapus Semua Data Murid</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus semua data murid di kelas ini? Tindakan ini tidak dapat diurungkan. Masukkan password admin untuk konfirmasi.</p>
                <form id="deleteAllMuridForm" method="POST" action="{{ $route }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
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