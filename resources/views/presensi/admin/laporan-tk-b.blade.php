@php
$kelas = 'TK B';
$routeName = route('laporan-tk-b');
$tanggal = request('tanggal');

// Hanya ambil data murid jika ada tanggal yang dipilih
$presensiData = collect();
if ($tanggal) {
    $murid = App\Models\MuridTKBestari::where('kelas_id', 3)
        ->with(['presensi' => function($query) use ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }])
        ->get();

    // Format data untuk display
    $presensiData = $murid->map(function($murid) {
        $presensi = $murid->presensi->first();
        return [
            'id' => $murid->id,
            'nama' => $murid->nama_siswa,
            'kehadiran' => $presensi ? ($presensi->kehadiran === 'H' ? 'Hadir' : 'Tidak Hadir') : 'Tidak Hadir',
            'keterangan' => $presensi ? $presensi->keterangan : '-'
        ];
    });
}
@endphp

<x-laporan-tk 
    :kelas="$kelas"
    :routeName="$routeName"
    :presensiData="$presensiData"
/>