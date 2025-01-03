@php
$kelas = 'TK';
$guru = App\Models\Guru::whereIn('kelas_id', [2, 3, 4])
    ->select('id', 'nama_guru as nama', 'nip')
    ->get();

// Debug output
\Log::info('TK Guru data:', $guru->toArray());
@endphp

<x-laporan-guru 
    :kelas="$kelas" 
    :guru="$guru"
/>