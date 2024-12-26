<script>
function showFormModal(type) {
    // Tutup modal pilih kelas
    $('#pilihKelasModal').modal('hide');
    
    // Tampilkan modal form sesuai pilihan
    if (type === 'daycare') {
        $('#formDaycareModal').modal('show');
    } else if (type === 'tk') {
        $('#formTKModal').modal('show');
    }
}

// Handler ketika modal ditutup
$('#formDaycareModal, #formTKModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset'); // Reset form
});

// Pastikan backdrop hilang saat modal ditutup
$('#formDaycareModal, #formTKModal').on('hide.bs.modal', function () {
    $('.modal-backdrop').remove(); // Hapus backdrop jika masih ada
});
</script> 