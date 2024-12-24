@php
$kelas = 'TK';
$presensiData = [
    [
        'tanggal' => '01',
        'jam_datang' => '07:00',
        'jam_pulang' => '16:30',
        'status_kehadiran' => 'Hadir',
        'keterangan' => '',
        'koordinat' => 'S-6.123456, E-106.123456',
        'foto' => 'foto1.jpg'
    ],
    [
        'tanggal' => '02',
        'jam_datang' => '07:00',
        'jam_pulang' => '16:30',
        'status_kehadiran' => 'Hadir',
        'keterangan' => '',
        'koordinat' => 'S-6.123456, E-106.123456',
        'foto' => 'foto1.jpg'
    ],
    [
        'tanggal' => '03',
        'jam_datang' => '07:00',
        'jam_pulang' => '16:30',
        'status_kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Sakit',
        'koordinat' => 'S-6.123456, E-106.123456',
        'foto' => 'foto1.jpg'
    ],
];
@endphp

<x-laporan-guru :kelas="$kelas" :presensiData="$presensiData" />