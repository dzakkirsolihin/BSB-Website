{{-- download-button.blade.php --}}
@props(['kelas'])

<div class="d-flex justify-content-center my-4">
    <div class="btn-group">
        <button id="btn-unduh" class="btn btn-success text-white" onclick="unduhLaporan('pdf')">
            Unduh Laporan
        </button>
        <button type="button" 
                class="btn btn-success text-white dropdown-toggle dropdown-toggle-split" 
                data-bs-toggle="dropdown" 
                aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('pdf')">PDF</a></li>
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('word')">Word</a></li>
            <li><a class="dropdown-item" href="#" onclick="unduhLaporan('excel')">Excel</a></li>
        </ul>
    </div>
</div>

@push('scripts')
{{-- Make sure Bootstrap bundle is loaded first --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all dropdowns
        var dropdownElementList = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    });

    function unduhLaporan(format) {
        const tanggalInput = document.getElementById('tanggal');
        if (!tanggalInput || !tanggalInput.value) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Silakan pilih tanggal terlebih dahulu',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        // Convert display date to YYYY-MM-DD format
        const dateParts = tanggalInput.value.split(', ')[1].split(' ');
        const monthMap = {
            'Januari': '01', 'Februari': '02', 'Maret': '03', 'April': '04',
            'Mei': '05', 'Juni': '06', 'Juli': '07', 'Agustus': '08',
            'September': '09', 'Oktober': '10', 'November': '11', 'Desember': '12'
        };

        const formattedDate = `${dateParts[2]}-${monthMap[dateParts[1]]}-${dateParts[0].padStart(2, '0')}`;
        
        // Build URL based on format
        let url = '/unduh-laporan';
        switch(format) {
            case 'pdf':
                url += '/pdf';
                break;
            case 'word':
                url += '/word';
                break;
            case 'excel':
                url += '/excel';
                break;
            default:
                url += '/pdf';
        }

        url += `?tanggal=${formattedDate}&kelas=${encodeURIComponent('{{ $kelas }}')}`;
        window.location.href = url;
    }
</script>
@endpush