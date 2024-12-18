<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #008000;">
    <div class="container-fluid">
        <div class="navbar-collapse justify-content-center align-items-center d-flex d-lg-justify-content-between gap-3">
            <div>
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('index') }}">
                    <x-application-logo class="d-inline-block align-text-top me-2"  width="50" height="50" />
                    <h1 class="navbar-brand mb-0 text-white font-bold">Baitush Sholihin <br /> Bandung</h1>
                </a>
            </div>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarToggleExternalContent" data-bs-theme="dark">
            <div class="justify-content-center d-flex align-items-center gap-2">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                            {{ __('HOME') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('profile-yayasan')" :active="request()->routeIs('profile-yayasan')">
                            {{ __('PROFILE') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('program-pendidikan')" :active="request()->routeIs('program-pendidikan')">
                            {{ __('PROGRAM PENDIDIKAN') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('program-unggulan')" :active="request()->routeIs('program-unggulan')">
                            {{ __('PROGRAM UNGGULAN') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('faq')" :active="request()->routeIs('faq')">
                            {{ __('FAQ') }}
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


