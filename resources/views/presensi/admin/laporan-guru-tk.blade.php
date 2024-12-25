@php
$kelas = 'TK';

// Data dummy guru
$guru = [
    (object)[
        'id' => 1,
        'nama' => 'Euis Kartika'
    ],
    (object)[
        'id' => 2,
        'nama' => 'Titin Sumarni'
    ],
    (object)[
        'id' => 3,
        'nama' => 'Suci Pebrianti'
    ]
];

@endphp

<x-laporan-guru 
    :kelas="$kelas" 
    :guru="$guru" 
/>