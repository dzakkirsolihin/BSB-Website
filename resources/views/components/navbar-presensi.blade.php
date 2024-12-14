<nav class="bg-custom py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 d-flex align-items-center">
                <a href="{{ route('dashboard-guru') }}" class="text-decoration-none">
                    <x-application-logo alt="Logo of Baitush Sholihin Bandung" width="40" height="40" class="me-3" />
                    <span class="h4 mb-0 text-primary-custom fw-bold">Baitush Sholihin Bandung</span>
                </a>
            </div>
            <div class="col-md-6">
                <nav class="d-flex justify-content-end">
                    <a href="{{ route('dashboard-guru') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Beranda</a>
                    <a href="{{ route('presensi-guru') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Presensi Guru</a>
                    <a href="{{ route('riwayat-presensi-guru') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Riwayat Presensi</a>
                    <a href="{{ route('dashboard-presensi-murid') }}" class="text-primary-custom text-decoration-none fw-bold mx-3">Presensi Murid</a>
                    @if(auth()->user()->role === 'Admin')
                        <a href="{{ route('dashboard-admin') }}">
                            <button class="btn btn-primary-custom text-white fw-bold mx-2">Admin</button>
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button class="btn btn-sm fs-6 text-white" style="background: linear-gradient(to left,#FF0000,#910000);">
                            {{ __('LOGOUT') }}
                        </x-primary-button>
                    </form>
                </nav>
            </div>
        </div>
    </div>
</nav>
