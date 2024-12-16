<div class="d-flex justify-content-center my-4">
    <div class="btn-group">
        <button id="btn-unduh" class="btn btn-primary-custom text-white" onclick="unduhLaporan('pdf')">Unduh Laporan</button>
        <button type="button" class="btn btn-primary-custom text-white dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('pdf')">PDF</a></li>
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('word')">Word</a></li>
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('excel')">Excel</a></li>
        </ul>
    </div>
</div>
<script>
    // Fungsi untuk mengunduh laporan
    function unduhLaporan(format) {
            let url = '';

            // Tentukan URL berdasarkan format yang dipilih
            if (format === 'word') {
                url = '/unduh-laporan/word'; // Ganti dengan route yang sesuai
            } else if (format === 'excel') {
                url = '/unduh-laporan/excel'; // Ganti dengan route yang sesuai
            } else {
                url = '/unduh-laporan/pdf'; // Default ke PDF
            }

            // Redirect ke URL untuk mengunduh
            window.location.href = url;
        }
</script>