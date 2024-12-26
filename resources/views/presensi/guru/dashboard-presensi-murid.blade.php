<x-presensi-layout>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Murid</h1>

        @php
            // Data dummy yang terstruktur
            $presensiItems = [
                [
                    'route' => 'presensi-daycare',
                    'image' => asset('Assets/presensi/daycare.jpg'),
                    'title' => 'DAYCARE',
                    'description' => 'Catat Presensi Harian Murid Daycare',
                    'is_tk' => false,
                    'is_daycare' => true,
                ],
                [
                    'route' => 'presensi-tk-a',
                    'image' => asset('Assets/presensi/tk-a.jpg'),
                    'title' => 'TK A',
                    'description' => 'Catat Presensi Harian Murid Kelas TK A',
                    'is_tk' => true,
                    'is_daycare' => false,
                ],
                [
                    'route' => 'presensi-tk-b',
                    'image' => asset('Assets/presensi/tk-b.jpg'),
                    'title' => 'TK B',
                    'description' => 'Catat Presensi Harian Murid Kelas TK B',
                    'is_tk' => true,
                    'is_daycare' => false,
                ],
                [
                    'route' => 'presensi-bestari',
                    'image' => asset('Assets/presensi/bestari.jpg'),
                    'title' => 'BESTARI',
                    'description' => 'Catat Presensi Harian Murid Kelas Bestari',
                    'is_tk' => true,
                    'is_daycare' => false,
                ],
            ];
        @endphp

        <div class="row g-4 justify-content-center">
            <div class="row g-4 justify-content-center">
                @if(auth()->user() && auth()->user()->guru && auth()->user()->guru->kelas)  {{-- Check if user, guru, and kelas exist --}}
                    @foreach ($presensiItems as $item)
                        @if (auth()->user()->guru->kelas->is_tk == $item['is_tk'] || auth()->user()->guru->kelas->is_daycare == $item['is_daycare'])
                            <a href="{{ route($item['route']) }}" class="col-md-3 text-decoration-none">
                                <div>  {{-- Added missing opening div --}}
                                    <div class="card h-100 shadow-sm rounded-4">
                                        <img src="{{ $item['image'] }}" class="card-img-top rounded-4 img-fluid" alt="{{ $item['title'] }}" style="height: 250px; object-fit: cover;">
                                        <div class="card-body text-center">
                                            <h3 class="card-title text-primary-custom">{{ $item['title'] }}</h3>  {{-- Corrected closing tag --}}
                                            <p class="card-text text-primary-custom">{{ $item['description'] }}</p>  {{-- Corrected closing tag --}}
                                        </div>
                                    </div>
                                </div>  {{-- Added missing closing div --}}
                            </a>
                        @endif
                    @endforeach
                @else  {{-- Handle the case where user, guru, or kelas is null --}}
                    <div class="col-md-3 text-decoration-none">
                        <div>  {{-- Added missing opening div --}}
                            <div class="card h-100 shadow-sm rounded-4">
                                <div class="card-body text-center">
                                    <h3 class="card-title text-primary-custom">Kelas tidak ditemukan</h3>  {{-- Corrected closing tag --}}
                                    <p class="card-text text-primary-custom">Tidak ada kelas yang ditugaskan untuk Anda. Silahkan hubungi admin untuk mengisi kelas untuk diajar.</p>
                                </div>
                            </div>
                        </div>  {{-- Added missing closing div --}}
                    </div>
                @endif {{-- Closing tag for the outer @if --}}
            </div>
        </div>
    </main>
</x-presensi-layout>
