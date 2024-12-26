<!-- Modal Hapus Murid TK -->
<div class="modal fade" id="deleteMuridModal" tabindex="-1" aria-labelledby="deleteMuridModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMuridModalLabel">Hapus Data Murid</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data murid ini? Masukkan password admin untuk konfirmasi.</p>
                <form id="deleteMuridForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="admin_password" class="form-label">Password Admin</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-daycare-btn').forEach(button => {
            button.addEventListener('click', function() {
                const deleteMuridForm = document.getElementById('deleteMuridForm');
                const noInduk = this.getAttribute('data-murid-no-induk');
                // Set action URL dengan no_induk yang benar
                deleteMuridForm.action = `/muridDaycare/${noInduk}/delete`;
            });
        });
        
        // Handler untuk tombol delete TKBestari
        document.querySelectorAll('.delete-tk-btn').forEach(button => {
            button.addEventListener('click', function() {
                const deleteMuridForm = document.getElementById('deleteMuridForm');
                const noInduk = this.getAttribute('data-murid-no-induk');
                // Set action URL dengan no_induk yang benar
                deleteMuridForm.action = `/muridTkBestari/${noInduk}/delete`;
            });
        });
    });
</script>