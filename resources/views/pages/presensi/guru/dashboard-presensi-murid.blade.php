<x-layout-presensi>
    <main class="container py-4">
        <h1 class="text-center inter-font text-primary-custom mb-5">Presensi Murid</h1>
        
        @php
            // Data dummy yang terstruktur
            $presensiItems = [
                [
                    'route' => 'presensi-daycare',
                    'image' => asset('Assets/presensi/daycare.jpg'),
                    'title' => 'DAYCARE',
                    'description' => 'Catat Presensi Harian Murid',
                ],
                [
                    'route' => 'presensi-tk-a',
                    'image' => asset('Assets/presensi/tk-a.jpg'),
                    'title' => 'TK A',
                    'description' => 'Catat Presensi Harian Murid',
                ],
                [
                    'route' => 'presensi-tk-b',
                    'image' => asset('Assets/presensi/tk-b.jpg'),
                    'title' => 'TK B',
                    'description' => 'Catat Presensi Harian Murid',
                ],
                [
                    'route' => 'presensi-bestari',
                    'image' => asset('Assets/presensi/bestari.jpg'),
                    'title' => 'BESTARI',
                    'description' => 'Catat Presensi Harian Murid',
                ],
            ];
        @endphp

        <div class="row g-4 justify-content-center">
            @foreach ($presensiItems as $item)
                <a href="{{ $item['route'] }}" class="col-md-3 text-decoration-none">
                    <div>
                        <div class="card h-100 shadow-sm rounded-4">
                            <img src="{{ $item['image'] }}" 
                                class="card-img-top rounded-4 img-fluid" alt="{{ $item['title'] }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3 class="card-title text-primary-custom">{{ $item['title'] }}</h3>
                                <p class="card-text text-primary-custom">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
</x-layout-presensi>