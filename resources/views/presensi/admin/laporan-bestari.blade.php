@php
$kelas = 'BESTARI';
$presensiData = [
    [
        'id' => 1,
        'nama' => 'Arap',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 2,
        'nama' => 'Bagas',
        'kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Sakit'
    ],
    [
        'id' => 3,
        'nama' => 'Bima',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 4,
        'nama' => 'Dina',
        'kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Izin'
    ],
    [
        'id' => 5,
        'nama' => 'Fajar',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 6,
        'nama' => 'Laras',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 7,
        'nama' => 'Nayla',
        'kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Tanpa Keterangan'
    ],
    [
        'id' => 8,
        'nama' => 'Putri',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 9,
        'nama' => 'Salsabila',
        'kehadiran' => 'Hadir',
        'keterangan' => ''
    ],
    [
        'id' => 10,
        'nama' => 'Zidan',
        'kehadiran' => 'Tidak Hadir',
        'keterangan' => 'Izin'
    ]
];
@endphp
<x-laporan-tk :kelas="$kelas" :presensiData="$presensiData" />