<footer>
    <!-- Main Footer -->
    <div class="bg-success pt-4 pb-3">
        <div class="container">
            <div class="row gy-3">
                <!-- Logo & Address Column -->
                <div class="col-lg-5">
                    <div class="d-flex flex-column">
                        <!-- Logo & School Name -->
                        <div class="d-flex align-items-center mb-3">
                            <a href="{{ route('index') }}" class="me-3">
                                <x-application-logo width="80" height="80" />
                            </a>
                            <h2 class="h5 text-warning mb-0">YAYASAN BAITUSH SHOLIHIN</h2>
                        </div>
                        <!-- Address -->
                        <address class="text-white opacity-75 mb-3">
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt-fill me-2 mt-1"></i>
                                <div class="small">
                                    <h6 class="text-white mb-1">Yayasan</h6>
                                    <p class="mb-1">Jl. Kanayakan No.344/15b, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat 40135</p>
                                    <a href="https://maps.app.goo.gl/r5AryDXJ392n2N7T9" 
                                       class="btn btn-outline-light btn-sm py-0 px-2" 
                                       target="_blank">
                                        <i class="bi bi-map me-1"></i>Buka di Google Maps
                                    </a>
                                </div>
                            </div>
                            <!-- Contact Information -->
                            <div class="d-flex align-items-center small mb-1">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <span>(022) 2512386</span>
                            </div>
                            <div class="d-flex align-items-center small">
                                <i class="bi bi-phone-fill me-2"></i>
                                <span>(+62) 82130639827</span>
                            </div>
                        </address>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-sm-6 col-lg-3">
                    <h3 class="h6 text-white mb-3">QUICK LINKS</h3>
                    <ul class="list-unstyled mb-0 small">
                        <li class="mb-2">
                            <a href="{{ route('index') }}" class="nav-link text-white opacity-75 py-1 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2"></i>Home
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('profile-yayasan') }}" class="nav-link text-white opacity-75 py-1 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2"></i>Profile
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('program-daycare') }}" class="nav-link text-white opacity-75 py-1 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2"></i>Program Daycare
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('program-tk') }}" class="nav-link text-white opacity-75 py-1 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2"></i>Program TK
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('faq') }}" class="nav-link text-white opacity-75 py-1 d-flex align-items-center">
                                <i class="bi bi-chevron-right me-2"></i>FAQ
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media Column -->
                <div class="col-sm-6 col-lg-4">
                    <h3 class="h6 text-white mb-3">SOSIAL MEDIA</h3>
                    <div class="d-flex gap-3 mb-3">
                        <a href="http://wa.me/+6282130639827" class="text-white fs-5 social-icon">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/tpadutafirdaus" class="text-white fs-5 social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@tpa.duta.firdaus" class="text-white fs-5 social-icon">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        <a href="https://youtube.com/@paudtahfidzpreneurdutafird6574" class="text-white fs-5 social-icon">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                    <p class="text-white opacity-75 small mb-0">Ikuti kami di sosial media untuk mendapatkan informasi terbaru tentang kegiatan dan program kami.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="bg-success-dark py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-white opacity-75 small mb-2 mb-md-0">Yayasan Baitush Sholihin &copy; {{ date('Y') }}. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="text-white opacity-75 small mb-0">Developed with <i class="bi bi-heart-fill text-danger"></i> in Bandung by lastMinute</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-success-dark {
            background-color: #006400;
        }
        
        .social-icon {
            opacity: 0.8;
            transition: transform 0.2s ease;
        }

        .social-icon:hover {
            opacity: 1;
            transform: translateY(-2px);
            color: white !important;
            text-decoration: none;
        }

        .nav-link {
            transition: opacity 0.2s ease;
        }

        .nav-link:hover {
            opacity: 1 !important;
        }

        .btn-outline-light {
            transition: all 0.2s ease;
        }
        
        .btn-outline-light:hover {
            background-color: #fff;
            color: #198754;
        }

        @media (max-width: 576px) {
            .small {
                font-size: 0.8rem;
            }
        }
    </style>
</footer>