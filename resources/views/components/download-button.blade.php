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
    function unduhLaporan(format) {
        const tanggal = document.getElementById('tanggal').value;
        const kelas = '{{ $kelas }}';

        if (!tanggal) {
            alert('Silakan pilih tanggal terlebih dahulu');
            return;
        }

        // Convert display date to YYYY-MM-DD format
        const dateParts = tanggal.split(', ')[1].split(' ');
        const monthMap = {
            'Januari': '01', 'Februari': '02', 'Maret': '03', 'April': '04',
            'Mei': '05', 'Juni': '06', 'Juli': '07', 'Agustus': '08',
            'September': '09', 'Oktober': '10', 'November': '11', 'Desember': '12'
        };

        const formattedDate = `${dateParts[2]}-${monthMap[dateParts[1]]}-${dateParts[0].padStart(2, '0')}`;
        const url = `/unduh-laporan/excel?tanggal=${formattedDate}&kelas=${encodeURIComponent(kelas)}`;

        window.location.href = url;
    }
</script>
