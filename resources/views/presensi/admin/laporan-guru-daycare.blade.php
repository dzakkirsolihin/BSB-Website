@php
$kelas = 'Daycare';

// Get guru data for Daycare (kelas_id = 1)
$guru = App\Models\Guru::where('kelas_id', 1)
    ->select('id', 'nama_guru as nama', 'nip')
    ->get();
@endphp

<x-laporan-guru 
    :kelas="$kelas" 
    :guru="$guru"
/>