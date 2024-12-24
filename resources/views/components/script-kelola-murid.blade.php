@props(['kelas'])

{{-- Load jQuery first --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Load Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
    // Tunggu sampai DOM sepenuhnya dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi modal Bootstrap
        const editModalEl = document.getElementById('editStudentModal');
        const editModal = new bootstrap.Modal(editModalEl);
        
        let originalFormData = {};

        function hasFormChanged() {
            const currentNama = document.getElementById('editNama').value;
            const currentJK = document.querySelector('input[name="editJenisKelamin"]:checked')?.value;
            const currentKelas = document.getElementById('editKelas').value;
            
            return currentNama !== originalFormData.nama ||
                currentJK !== originalFormData.jk ||
                currentKelas !== originalFormData.kelas;
        }

        function storeOriginalFormData() {
            originalFormData = {
                nama: document.getElementById('editNama').value,
                jk: document.querySelector('input[name="editJenisKelamin"]:checked')?.value,
                kelas: document.getElementById('editKelas').value
            };
        }

        // Edit button handler
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const studentId = this.dataset.studentId;
                const studentNama = this.dataset.studentNama;
                const studentJK = this.dataset.studentJk;
                const studentKelas = this.dataset.studentKelas;

                document.getElementById('editStudentId').value = studentId;
                document.getElementById('editNama').value = studentNama;
                document.getElementById('editKelas').value = studentKelas;
                
                if (studentJK === 'Laki-laki') {
                    document.getElementById('editLakiLaki').checked = true;
                } else if (studentJK === 'Perempuan') {
                    document.getElementById('editPerempuan').checked = true;
                }

                storeOriginalFormData();
                editModal.show();
            });
        });

        // Cancel and close handlers
        ['#batalEditBtn', '.btn-close'].forEach(selector => {
            document.querySelector(selector).addEventListener('click', function() {
                if (hasFormChanged()) {
                    if (confirm('Data yang Anda ubah belum tersimpan. Apakah Anda yakin ingin membatalkan?')) {
                        editModal.hide();
                        document.getElementById('editStudentForm').reset();
                    }
                } else {
                    editModal.hide();
                    document.getElementById('editStudentForm').reset();
                }
            });
        });

        // Save handler
        document.getElementById('simpanEditStudentBtn').addEventListener('click', function() {
            const form = document.getElementById('editStudentForm');
            if (form.checkValidity()) {
                const studentId = document.getElementById('editStudentId').value;
                const nama = document.getElementById('editNama').value;
                const jk = document.querySelector('input[name="editJenisKelamin"]:checked').value;
                const kelas = document.getElementById('editKelas').value;

                // Here you would typically send the data to your server
                alert(`Data murid diperbarui:\nID: ${studentId}\nNama: ${nama}\nJenis Kelamin: ${jk}\nKelas: ${kelas}`);
                editModal.hide();
                form.reset();
            } else {
                form.reportValidity();
            }
        });

        // Delete handler
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const studentId = this.dataset.studentId;
                if (confirm('Apakah Anda yakin ingin menghapus data murid ini?')) {
                    alert(`Akun murid dengan ID ${studentId} telah dihapus.`);
                    this.closest('tr').remove();
                }
            });
        });
    });
</script>