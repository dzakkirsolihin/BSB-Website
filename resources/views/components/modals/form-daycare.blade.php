<div class="modal fade" id="formDaycareModal" tabindex="-1" aria-labelledby="formDaycareModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDaycareModalLabel">Tambah Siswa Daycare</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('daycare.store') }}" method="POST">
                @csrf
                <input type="hidden" name="kelas_id" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="no_induk" class="form-label">No Induk</label>
                        <input type="text" class="form-control" id="no_induk" name="no_induk" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l_daycare" value="L" required>
                                <label class="form-check-label" for="jk_l_daycare">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p_daycare" value="P" required>
                                <label class="form-check-label" for="jk_p_daycare">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp_orang_tua" class="form-label">No Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="no_telp_orang_tua" name="no_telp_orang_tua" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary-custom text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> 