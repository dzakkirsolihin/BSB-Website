@php
$kelas = 'TK';
$presensiData = [
    [
        'tanggal' => '01 Januari 2024',
        'jam_datang' => '07:00',
        'jam_pulang' => '15:00',
        'status_kehadiran' => 'Hadir',
        'keterangan' => '',
        'koordinat' => 'S-6.123456, E-106.123456',
        'foto' => 'foto1.jpg',
        'nama' => 'Euis Kartika'
    ],
    [
        'tanggal' => '01 Januari 2024',
        'jam_datang' => '07:15',
        'jam_pulang' => '15:15',
        'status_kehadiran' => 'Hadir',
        'keterangan' => '',
        'koordinat' => 'S-6.123456, E-106.123457',
        'foto' => 'foto2.jpg',
        'nama' => 'Titin Sumarni'
    ],
    [
        'tanggal' => '01 Januari 2024',
        'jam_datang' => '07:30',
        'jam_pulang' => '15:30',
        'status_kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Sakit',
        'koordinat' => 'S-6.123456, E-106.123458',
        'foto' => 'foto3.jpg',
        'nama' => 'Suci Pebrianti'
    ],
];
@endphp

<x-laporan-guru :kelas="$kelas" :presensiData="$presensiData" />