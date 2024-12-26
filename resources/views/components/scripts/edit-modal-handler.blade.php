<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handler untuk tombol edit Daycare
    document.querySelectorAll('.edit-daycare-btn').forEach(button => {
        button.addEventListener('click', function() {
            const murid = JSON.parse(this.dataset.murid);
            const form = document.getElementById('editDaycareForm');
            
            // Set action URL
            form.action = `/muridDaycare/${murid.id}/update`;
            
            // Isi form dengan data murid
            document.getElementById('edit_no_induk_daycare').value = murid.no_induk;
            document.getElementById('edit_nama_siswa_daycare').value = murid.nama_siswa;
            document.getElementById('edit_no_telp_orang_tua_daycare').value = murid.no_telp_orang_tua;
            document.getElementById('edit_alamat_daycare').value = murid.alamat;
            
            // Set jenis kelamin
            if (murid.jk === 'L') {
                document.getElementById('edit_jk_l_daycare').checked = true;
            } else {
                document.getElementById('edit_jk_p_daycare').checked = true;
            }
            
            // Tampilkan modal
            new bootstrap.Modal(document.getElementById('editDaycareModal')).show();
        });
    });

    // Handler untuk tombol edit TK
    document.querySelectorAll('.edit-tk-btn').forEach(button => {
        button.addEventListener('click', function() {
            const murid = JSON.parse(this.dataset.murid);
            const form = document.getElementById('editTKForm');
            
            // Set action URL
            form.action = `/muridTkBestari/${murid.nis}/update`;
            
            // Isi form dengan data murid
            document.getElementById('edit_kelas_tk').value = murid.kelas_id;
            document.getElementById('edit_no_induk_tk').value = murid.no_induk;
            document.getElementById('edit_nis_tk').value = murid.nis;
            document.getElementById('edit_nama_siswa_tk').value = murid.nama_siswa;
            document.getElementById('edit_no_telp_orang_tua_tk').value = murid.no_telp_orang_tua;
            document.getElementById('edit_alamat_tk').value = murid.alamat;
            
            // Set jenis kelamin
            if (murid.jk === 'L') {
                document.getElementById('edit_jk_l_tk').checked = true;
            } else {
                document.getElementById('edit_jk_p_tk').checked = true;
            }
            
            // Tampilkan modal
            new bootstrap.Modal(document.getElementById('editTKModal')).show();
        });
    });
});
</script> 