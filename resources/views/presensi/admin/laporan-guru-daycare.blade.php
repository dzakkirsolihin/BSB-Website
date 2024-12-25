{{-- laporan-guru-daycare.blade.php --}}
@php
$kelas = 'Daycare';

// Data guru
$guru = [
    (object)[
        'id' => 1,
        'nama' => 'Ema Kusmiati'
    ],
    (object)[
        'id' => 2,
        'nama' => 'Nenur Dahyati'
    ],
    (object)[
        'id' => 3,
        'nama' => 'Ade Suparman'
    ],
    (object)[
        'id' => 4,
        'nama' => 'Dea Rizqi Shifany'
    ]
];

@endphp

<x-laporan-guru 
    :kelas="$kelas" 
    :guru="$guru"
/>