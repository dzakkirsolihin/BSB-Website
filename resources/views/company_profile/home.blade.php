<x-app-layout>
    <div class="min-vh-100">
        <!-- Hero Section -->
        <section class="position-relative vh-100 d-flex align-items-center" style="background: linear-gradient(rgba(0,128,0,0.7), rgba(0,0,0,0.5)), url('{{ asset('Assets/img/hero.JPG') }}') center/cover no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-white" data-aos="fade-right">
                        {{-- <h3 class="display-6 mb-3">Halo, Selamat Datang</h3> --}}
                        <h2 class="display-4 fw-bold text-warning mb-4">YAYASAN BAITUSH SHOLIHIN BANDUNG</h2>
                        <p class="lead mb-4">
                            Yayasan Baitush Sholihin Bandung adalah lembaga yang bergerak dalam bidang pendidikan, sosial & keagamaan. Berdiri sejak tahun 2014 di Jalan Kanayan No 344/15b RT 07 RW 08, Kelurahan Dago, Kecamatan Coblong, Kota Bandung.
                        </p>
                        <a href="http://wa.me/+6282130639827" class="btn btn-success btn-lg px-4 rounded-pill">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Program Pendidikan Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-down">
                    <h2 class="display-5 fw-bold text-success mb-3">PROGRAM PENDIDIKAN</h2>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="bi bi-star-fill"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Daycare Card -->
                    <div class="col-md-6" data-aos="fade-right">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('Assets/img/program2.jpg') }}" class="img-fluid h-100 object-fit-cover" alt="Daycare">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h3 class="card-title fw-bold text-success">DAYCARE DUTA FIRDAUS</h3>
                                        <p class="card-text flex-grow-1">TPA/Daycare untuk siswa usia 3 bulan sampai 6 tahun, beroperasi dari jam 07.00 s.d 16.30</p>
                                        <a href="{{ route('program-daycare') }}" class="btn btn-outline-success">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TK Card -->
                    <div class="col-md-6" data-aos="fade-left">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="{{ asset('Assets/img/program1.JPG') }}" class="img-fluid h-100 object-fit-cover" alt="TK">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body d-flex flex-column h-100">
                                        <h3 class="card-title fw-bold text-success">TK DUTA FIRDAUS</h3>
                                        <p class="card-text flex-grow-1">Kober/TK untuk usia 3-4 tahun, beroperasi dari pukul 08.00 s.d 11.00</p>
                                        <a href="{{ route('program-tk') }}" class="btn btn-outline-success">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Program Unggulan Section -->
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-down">
                    <h2 class="display-5 fw-bold text-success">PROGRAM UNGGULAN</h2>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="bi bi-star-fill"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-5" data-aos="fade-up">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-success text-white py-3">
                                <h3 class="card-title h4 text-center mb-0">TAHFIDZ PRENEUR</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    TPA/Kober dengan keunggulan pada tahfidz terutama hafal juz 30 & preneur. Siswa dibekali pemahaman dan praktik jual beli serta kemampuan membuat produk sendiri.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-header bg-success text-white py-3">
                                <h3 class="card-title h4 text-center mb-0">BESTARI</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Program belajar bermain sehari dilaksanakan setiap Jumat, khusus untuk siswa usia 3-6 tahun yang belum mendapatkan pendidikan PAUD.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image Carousel Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('Assets/img/slide3.jpg') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('Assets/img/slide2.jpg') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('Assets/img/slide1.jpg') }}" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Slide 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <!-- Custom CSS -->
    <style>
        .divider-custom {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .divider-custom-line {
            width: 100%;
            max-width: 7rem;
            height: 0.25rem;
            background-color: #198754;
            border-radius: 1rem;
            margin: 0 1rem;
        }
        
        .divider-custom-icon {
            color: #198754;
            font-size: 2rem;
        }
        
        .object-fit-cover {
            object-fit: cover;
        }
    </style>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</x-app-layout>