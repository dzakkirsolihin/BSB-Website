<div class="modal fade" id="editTKModal" tabindex="-1" aria-labelledby="editTKModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTKModalLabel">Edit Data Murid TK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editTKForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_kelas_tk" class="form-label">Kelas</label>
                        <select class="form-select" id="edit_kelas_tk" name="kelas_id" required>
                            <option value="2">TK A</option>
                            <option value="3">TK B</option>
                            <option value="4">Bestari</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_no_induk_tk" class="form-label">No Induk</label>
                        <input type="text" class="form-control" id="edit_no_induk_tk" name="no_induk" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nis_tk" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="edit_nis_tk" name="nis" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_nama_siswa_tk" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="edit_nama_siswa_tk" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="edit_jk_l_tk" value="L" required>
                                <label class="form-check-label" for="edit_jk_l_tk">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="edit_jk_p_tk" value="P" required>
                                <label class="form-check-label" for="edit_jk_p_tk">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_no_telp_orang_tua_tk" class="form-label">No Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="edit_no_telp_orang_tua_tk" name="no_telp_orang_tua" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_alamat_tk" class="form-label">Alamat</label>
                        <textarea class="form-control" id="edit_alamat_tk" name="alamat" rows="3" required></textarea>
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