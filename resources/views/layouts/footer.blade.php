<footer>
    <!-- Main Footer -->
    <div class="bg-success py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Logo & Address Column -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column h-100">
                        <!-- Logo -->
                        <div class="mb-4">
                            <a class="d-inline-block" href="{{ route('index') }}">
                                <x-application-logo width="120" height="120" />
                            </a>
                        </div>
                        <!-- School Name -->
                        <h2 class="h4 text-warning mb-3">YAYASAN BAITUSH SHOLIHIN</h2>
                        <!-- Address -->
                        <address class="text-white opacity-75 mb-4">
                            <div class="d-flex align-items-start mb-2">
                                <i class="bi bi-geo-alt-fill me-2 mt-1"></i>
                                <p class="mb-0">Jl. Kanayakan No.344/15b, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135</p>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <p class="mb-0">(022) 2512386</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-phone-fill me-2"></i>
                                <p class="mb-0">(+62) 82130639827</p>
                            </div>
                        </address>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-sm-6 col-lg-3">
                    <h3 class="h5 text-white mb-4">QUICK LINKS</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{{ route('index') }}" class="nav-link text-white opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2 small"></i>Home
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('profile-yayasan') }}" class="nav-link text-white opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2 small"></i>Profile
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('program-daycare') }}" class="nav-link text-white opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2 small"></i>Program Daycare
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('program-tk') }}" class="nav-link text-white opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2 small"></i>Program TK
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}" class="nav-link text-white opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2 small"></i>FAQ
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media Column -->
                <div class="col-sm-6 col-lg-4">
                    <h3 class="h5 text-white mb-4">SOSIAL MEDIA</h3>
                    <div class="d-flex gap-4 mb-4">
                        <a href="http://wa.me/+6282130639827" class="text-white fs-4 social-icon" aria-label="WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/tpadutafirdaus" class="text-white fs-4 social-icon" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@tpa.duta.firdaus" class="text-white fs-4 social-icon" aria-label="TikTok">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        <a href="https://youtube.com/@paudtahfidzpreneurdutafird6574" class="text-white fs-4 social-icon" aria-label="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                    <p class="text-white opacity-75">Ikuti kami di sosial media untuk mendapatkan informasi terbaru tentang kegiatan dan program kami.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="bg-success-dark py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-white opacity-75 mb-0">Yayasan Baitush Sholihin &copy; {{ date('Y') }}. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="text-white opacity-75 mb-0">Developed with <i class="bi bi-heart-fill text-danger"></i> in Bandung</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-success-dark {
            background-color: #006400;
        }
        
        .hover-opacity-100:hover {
            opacity: 1 !important;
            transition: opacity 0.3s ease;
        }
        
        .btn-outline-light {
            transition: all 0.3s ease;
        }
        
        .btn-outline-light:hover {
            background-color: #fff;
            color: #198754;
        }

        .social-icon {
            transition: all 0.3s ease;
            opacity: 0.8;
        }

        .social-icon:hover {
            opacity: 1;
            transform: translateY(-3px);
            color: white !important;
            text-decoration: none;
        }
        
        @media (max-width: 576px) {
            address {
                font-size: 0.9rem;
            }
            
            .h4 {
                font-size: 1.25rem;
            }
            
            .h5 {
                font-size: 1.1rem;
            }
        }
    </style>
</footer>