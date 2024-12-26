<div class="modal fade" id="editDaycareModal" tabindex="-1" aria-labelledby="editDaycareModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDaycareModalLabel">Edit Data Murid Daycare</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDaycareForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="kelas_id" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_no_induk_daycare" class="form-label">No Induk</label>
                        <input type="text" class="form-control" id="edit_no_induk_daycare" name="no_induk" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nama_siswa_daycare" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="edit_nama_siswa_daycare" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="edit_jk_l_daycare" value="L" required>
                                <label class="form-check-label" for="edit_jk_l_daycare">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="edit_jk_p_daycare" value="P" required>
                                <label class="form-check-label" for="edit_jk_p_daycare">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_no_telp_orang_tua_daycare" class="form-label">No Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="edit_no_telp_orang_tua_daycare" name="no_telp_orang_tua" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat_daycare" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat_daycare" name="alamat" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary-custom text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div> 