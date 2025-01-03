<x-app-layout>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
        rel="stylesheet"
        />

        <link
        href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;700&display=swap"
        rel="stylesheet"
        />

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <script src="https://unpkg.com/feather-icons"></script>

        <link rel="stylesheet" href="{{ asset('css/home-style.css') }}" />

        <title>Yayasan Baitush Sholihin</title>
    </head>
    <body>

        <!--hero start-->
        <section class="hero" id="home" style="background-image: url('{{ asset('Assets/img/hero.JPG') }}');">
        <main class="content" data-aos="fade-right">
            <h3>Halo, Selamat Datang</h3>
            <h2 class="fw-bold" style="color: #ccff33">YAYASAN BAITUSH SHOLIHIN</h2>
            <p>
            Yayasan Baitush Sholihin Bandung Adalah Lembaga Yang Bergerak Dalam
            Bidang Pendidikan, Sosial & Kegamaan, Yayasan Baitush Sholihin Bandung
            Berdiri Pada Tahun 2014 Yang Beralamat Di Jalan Kanayan No 344/15b Rt
            07 Rw 08 Kelurahan Dago Kecamatan Coblong Kota Bandung.
            </p>
            <a href="http://wa.me/+6282130639827" class="nav-link">Hubungi kami</a>
        </main>
        </section>
        <!--hero end-->

        <!--Program Pendidikan Start-->
        <section class="p-pendidikan" id="p-pendidikan">
        <h2 class="fw-bold" style="color: #ccff33" data-aos="fade-down">
            PROGRAM PENDIDIKAN
        </h2>
        <div class="garis-judul" data-aos="fade-down">
            <img src="{{ asset('Assets/img/garis.png') }}" alt="" />
        </div>

        <div class="program-list">
            <div class="program-item" data-aos="fade-right">
            <div class="program-image">
                <img src="{{ asset('Assets/img/program2.jpg') }}" alt="Daycare Duta Firdaus" />
            </div>
            <div class="program-content">
                <h3>DAYCARE DUTA FIRDAUS</h3>
                <p>
                TPA/Daycare Tempat penitipan siswa dari usia 3 bulan sampai 6
                tahun, jam operasionalnya dari jam 07.00 s.d 16.30
                </p>
                <a href="{{ route('program-daycare') }}"
                ><button class="btn btn-dark">Selengkapnya</button></a
                >
            </div>
            </div>

            <div class="program-item" data-aos="fade-left">
            <div class="program-image">
                <img src="{{ asset('Assets/img/program1.JPG') }}" alt="TK Duta Firdaus" />
            </div>
            <div class="program-content">
                <h3>TK DUTA FIRDAUS</h3>
                <p>
                Kober/TK adalah usia dari 3 tahun s.d 4 tahun Jam operasionalnya
                dari pukul 08.00 s.d 11.00
                </p>
                <a href="{{ route('program-tk') }}"
                ><button class="btn btn-dark">Selengkapnya</button></a
                >
            </div>
            </div>
        </div>
        </section>
        <!--Program Pendidikan End-->

        <!--Program Unggulan Start-->
        <section id="program_unggulan" class="program-unggulan" data-aos="fade-down">
            <!-- Kontainer Utama -->
            <div class="container-utama">
                <!-- Teks Program Unggulan -->
                <div class="judul-section">
                <h2 style="color: #ccff33">
                    PROGRAM <br />
                    UNGGULAN
                </h2>
                <div class="garis-judul">
                    <img src="{{ asset('Assets/img/garis.png') }}" alt="" />
                </div>
                <div class="hiasan-daun"></div>
                </div>

                <!-- Kontainer Card -->
                <div class="container-program">
                <!-- Card 1 -->
                <div class="card-program">
                    <div class="header-card">
                    <h3>TAHFIDZ PRENEUR</h3>
                    </div>
                    <div class="body-card">
                    <p>
                        TPA/Kober keunggulannya lebih menekankan tahfidz terutama hafal
                        juz 30 & preneur minimal siswa dapat memahami jual beli dan
                        mempraktekkan jual beli dan membuat produk sendiri.
                    </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card-program">
                    <div class="header-card">
                    <h3>BESTARI</h3>
                    </div>
                    <div class="body-card">
                    <p>
                        program belajar bermain sehari dilaksanakan setiap seminggu
                        sekali pada hari Jumat sasarannya yaitu khusus siswa usia 3-6
                        tahun yg belum tersentuh dengan pendidikan PAUD
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!--Program Unggulan End-->

        <!--Carousel Start-->
        <section class="carousel" data-aos="fade-down">
        <div class="container-fluid py-5">
            <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"
                ></button>
                <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"
                ></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('Assets/img/slide3.jpg') }}" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('Assets/img/slide2.jpg') }}" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('Assets/img/slide1.jpg') }}" class="d-block w-100" alt="..." />
                </div>
                </div>
                <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev"
                >
                <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next"
                >
                <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>
        </div>
        </section>
        <!--Carousel End-->

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
            feather.replace();
        </script>

        <script src="bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</x-app-layout>