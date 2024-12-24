@props(['kelas'])

<div id="editStudentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Murid</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm">
                    <input type="hidden" id="editStudentId">
                    <div class="form-group mb-3">
                        <label for="editNama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="editNama" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Kelamin:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="editJenisKelamin" id="editLakiLaki" value="Laki-laki" required>
                            <label class="form-check-label" for="editLakiLaki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="editJenisKelamin" id="editPerempuan" value="Perempuan" required>
                            <label class="form-check-label" for="editPerempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editKelas" class="form-label">Kelas:</label>
                        <select class="form-control" id="editKelas" required>
                            <option value="" disabled>Pilih Kelas...</option>
                            <option value="Daycare" {{ $kelas == 'Daycare' ? 'selected' : '' }}>Daycare</option>
                            <option value="TK A" {{ $kelas == 'TK A' ? 'selected' : '' }}>TK A</option>
                            <option value="TK B" {{ $kelas == 'TK B' ? 'selected' : '' }}>TK B</option>
                            <option value="Bestari" {{ $kelas == 'Bestari' ? 'selected' : '' }}>Bestari</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="batalEditBtn">Batal</button>
                <button type="button" class="btn btn-primary" id="simpanEditStudentBtn">Simpan</button>
            </div>
        </div>
    </div>
</div>