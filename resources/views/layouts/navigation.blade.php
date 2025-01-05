<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm sticky-top py-2">
    <div class="container">
        <!-- Logo & Brand -->
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('index') }}">
            <!-- Logo -->
            <div class="d-flex align-items-center">
                <x-application-logo width="50" height="50" />
            </div>
            <!-- Brand Text with Border -->
            <div class="ps-3 border-start border-white border-opacity-25">
                <h1 class="h5 fw-bold mb-0 text-white">Baitush Sholihin</h1>
                <p class="small text-white-50 mb-0">Bandung</p>
            </div>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('index') ? 'active fw-bold' : '' }}" href="{{ route('index') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('profile-yayasan') ? 'active fw-bold' : '' }}" href="{{ route('profile-yayasan') }}">PROFILE</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3 {{ request()->routeIs('program-tk', 'program-daycare') ? 'active fw-bold' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PROGRAM PENDIDIKAN
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                        <li><a class="dropdown-item py-2" href="{{ route('program-tk') }}">TK A & B</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('program-daycare') }}">Daycare</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('faq') ? 'active fw-bold' : '' }}" href="{{ route('faq') }}">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Custom styles to enhance Bootstrap */
.nav-link {
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: rgba(255, 255, 255, 0.95) !important;
}

.dropdown-item:hover {
    background-color: #198754;
    color: white;
}

@media (min-width: 992px) {
    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        left: 50%;
        bottom: 0;
        height: 2px;
        background-color: white;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 80%;
    }
}

@media (max-width: 991.98px) {
    .navbar-collapse {
        padding: 1rem 0;
    }
    
    .nav-link {
        padding: 0.5rem 1rem !important;
    }
}
</style>