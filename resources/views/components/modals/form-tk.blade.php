<div class="modal fade" id="formTKModal" tabindex="-1" aria-labelledby="formTKModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTKModalLabel">Tambah Siswa TK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tk.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kelas_tk" class="form-label">Kelas</label>
                        <select class="form-select" id="kelas_tk" name="kelas_id" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="2">TK A</option>
                            <option value="3">TK B</option>
                            <option value="4">Bestari</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_induk_tk" class="form-label">No Induk</label>
                        <input type="text" class="form-control" id="no_induk_tk" name="no_induk" required placeholder="Masukkan No Induk Murid">
                    </div>
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" required placeholder="Masukkan NIS Murid">
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa_tk" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa_tk" name="nama_siswa" required placeholder="Masukkan Nama Lengkap Siswa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l_tk" value="L" required>
                                <label class="form-check-label" for="jk_l_tk">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p_tk" value="P" required>
                                <label class="form-check-label" for="jk_p_tk">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_telp_orang_tua" class="form-label">No Telepon Orang Tua</label>
                        <input type="text" class="form-control" id="no_telp_orang_tua" name="no_telp_orang_tua" required placeholder="Masukkan No Telepon Orang Tua Murid: 08xxxxxxxxx">
                    </div>
                    <div class="mb-3">
                        <label for="alamat_tk" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat_tk" name="alamat" rows="3" required placeholder="Masukkan Alamat Lengkap Rumah Orang Tua Murid"></textarea>
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