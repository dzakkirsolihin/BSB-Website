<x-app-layout>
    <head>
        <title>Yayasan Baitush Sholihin</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                outline: none;
                border: none;
                text-decoration: none;
            }
            
            h2 {
                font-family: "Inknut Antiqua", serif;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
                -webkit-text-stroke: 0.4px black;
            }
            
            .navbar {
                background-color: rgba(0, 128, 0);
            }
            
            .navbar-brand span {
                color: white;
            }
            
            .navbar .nav-link {
                color: white !important; /* Ubah warna teks menjadi putih */
            }
            
            .navbar-brand img {
                height: 40px; /* Sesuaikan dengan kebutuhan */
                width: auto; /* Agar tetap proporsional */
                max-height: 100%;
            }
            
            .hero {
                min-height: 100vh;
                display: flex;
                align-items: center;
                position: relative;
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
            }
            
            .hero .content h3 {
                font-family: "Inknut Antiqua", serif;
                font-size: 1.5rem;
                margin-bottom: 20px;
            }
            
            .hero::after {
                content: "";
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                background: linear-gradient(
                180deg,
                rgba(0, 128, 0) 3%,
                rgba(255, 255, 255, 0) 80%
                );
                z-index: 1;
            }
            
            .hero::before {
                content: "";
                display: block;
                position: absolute;
                width: 100%;
                height: 20%;
                bottom: 0;
                background: linear-gradient(
                0deg,
                rgb(255, 255, 255) 3%,
                rgba(255, 255, 255, 0) 100%
                );
            }
            
            .hero .content {
                z-index: 2;
                padding: 1.4rem 7%;
                max-width: 50rem;
                color: white;
            }
            
            .hero .content .nav-link {
                display: inline-block;
                font-size: 1rem;
                padding: 0.8rem 2rem;
                color: white;
                background-color: #008000;
                border-radius: 0.5rem;
            }
            
            .p-pendidikan {
                min-height: 100vh;
                padding: 6rem 7% 1.4rem;
            }
            
            .p-pendidikan h2 {
                text-align: center;
                margin-bottom: 0.8rem;
            }
            
            .p-pendidikan .garis-judul {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            .p-pendidikan img {
                width: 200px;
                height: auto;
            }
            
            .program-list {
                display: flex;
                flex-direction: column;
                gap: 20px;
                margin: 20px;
            }
            
            .program-item {
                display: flex;
                background-color: #008000; /* Hijau utama */
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            .program-image img {
                width: 365px; /* Atur ukuran gambar */
                height: auto;
                object-fit: cover;
            }
            
            .program-content {
                flex: 1;
                padding: 20px;
                background-color: #70e000; /* Hijau muda */
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            
            .program-content h3 {
                color: #ffffff;
                background-color: #008000;
                padding: 10px 15px;
                border-radius: 5px;
                font-size: 1.5rem;
                margin-bottom: 15px;
            }
            
            .program-content p {
                color: #fff;
                margin-bottom: 15px;
            }
            
            .program-content .btn {
                align-self: flex-start;
                background-color: #006400; /* Hijau lebih gelap */
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            
            .program-content .btn:hover {
                background-color: #004d00; /* Warna hover */
            }
            
            /* program unggulan */
            
            /* Section Utama */
            .program-unggulan {
                padding: 20px;
                background-color: #fff;
            }
            
            /* Kontainer Utama */
            .container-utama {
                display: flex; /* Mengatur layout menggunakan Flexbox */
                align-items: center; /* Pusatkan vertikal */
                justify-content: center; /* Pusatkan horizontal */
                gap: 40px;
                flex-wrap: wrap; /* Jarak antara teks dan card */
            }
            
            /* Judul Section */
            .judul-section {
                text-align: center;
            }
            
            .judul-section h2 {
                font-size: 2.5rem;
                font-weight: bold;
                color: #85c12f; /* Hijau terang */
                text-shadow: 2px 2px 4px rgba(0, 128, 0, 0.5); /* Bayangan teks */
                margin: 0;
            }
            
            .program-unggulan .garis-judul img {
                width: 200px;
                height: auto;
                margin-top: 25px;
            }
            
            /* Kontainer Program */
            .container-program {
                display: flex;
                gap: 20px; /* Jarak antar card */
                justify-content: center;
                align-items: center;
                flex-wrap: wrap; /* Agar responsif */
            }
            
            /* Card Program */
            .card-program {
                width: 300px;
                height: 300px;
                background-color: #70e000;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            
            /* Header Card */
            .header-card {
                background-color: #008000; /* Hijau tua */
                color: #fff;
                padding: 10px;
                font-size: 1.2rem;
                font-weight: bold;
            }
            
            /* Body Card */
            .body-card {
                background-color: #70e000; /* Hijau terang */
                color: #fff;
                padding: 20px;
                font-size: 0.95rem;
                line-height: 1.6;
            }
            
            /* program unggulan */
            
            /* Carousel Start */
            .carousel-item img {
                max-width: 100%; /* Mengecilkan lebar menjadi 90% dari ukuran asli */
                height: 600px; /* Menyesuaikan tinggi secara proporsional */
                margin: 0 auto; /* Memastikan gambar tetap di tengah */
            }
            /* Carousel End */
            
            /* Footer */
            .footer {
                background-color: #008000; /* Warna hijau */
            }
            
            .footer h5 {
                text-transform: uppercase;
                font-size: 1rem;
                margin-bottom: 1rem;
                font-weight: bold;
            }
            
            .footer ul {
                padding: 0;
                list-style: none;
            }
            
            .footer ul li {
                margin-bottom: 0.5rem;
            }
            
            .footer ul li a {
                transition: color 0.3s;
            }
            
            .footer ul li a:hover {
                color: #ddd; /* Warna teks saat hover */
            }
            
            .footer .bi {
                transition: transform 0.3s, color 0.3s;
            }
            
            .footer .bi:hover {
                color: #ddd;
                transform: scale(1.2);
            }
            
            .footer p {
                margin: 0;
                font-size: 0.9rem;
            }
            /* Footer */
            
            .footer2 {
                background-color: #006400;
                color: white;
                padding: 20px 0;
                text-align: center;
                box-shadow: 0 2px 4px rgb(0, 0, 0);
            }
            
            .footer2 .footer2-container p {
                margin-top: 0;
                margin-bottom: 0;
            }
        </style>
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
    </body>
</x-app-layout>