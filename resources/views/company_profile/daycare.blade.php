<x-app-layout>
  <head>
    <title>Daycare Duta Firdaus</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
      }
      
      html {
        scroll-behavior: smooth;
      }
      
      :root {
        --primary: #ec994b;
        --white: #ffffff;
        --bg: #f5f5f5;
      }
      
      h2 {
        font-family: "Inknut Antiqua", serif;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
        -webkit-text-stroke: 0.4px black;
      }
      
      .navbar {
        background-color: rgba(0, 128, 0);
      }
      
      .navbar .nav-link {
        color: white !important; /* Ubah warna teks menjadi putih */
      }
      
      .navbar-brand img {
        height: 40px; /* Sesuaikan dengan kebutuhan */
        width: auto; /* Agar tetap proporsional */
        max-height: 100%;
      }
      
      .navbar-brand span {
        color: white;
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
      
      .hero .content {
        z-index: 2;
        padding: 1.4rem 7%;
        max-width: 50rem;
        color: white;
      }
      
      .hero .content .nav-link {
        display: inline-block;
        font-size: 1.1rem;
        padding: 0.8rem 2rem;
        color: white;
        background-color: #008000;
        border-radius: 0.5rem;
      }
      
      .hero::after {
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
      
      /* About daycare */
      .about-daycare {
        background-color: #ffffff; /* Warna latar belakang untuk kontras */
        padding: 3rem 1rem;
      }
      
      .about-daycare img {
        border-radius: 10px; /* Membuat gambar memiliki sudut membulat */
      }
      
      .about-daycare h2 {
        font-size: 2rem;
        color: #008000; /* Hijau */
        text-transform: uppercase;
        letter-spacing: 2px;
      }
      
      .about-daycare p {
        color: #333; /* Warna teks */
        line-height: 1.8;
      }
      
      /* About daycare */
      
      /* Section Fasilitas */
      .fasilitas {
        background-color: #ffffff; /* Latar belakang putih */
        padding: 3rem 1rem;
      }
      
      .fasilitas .text-center img {
        margin-bottom: 20px;
      }
      
      .fasilitas h2 {
        font-size: 2rem;
        color: #008000; /* Warna hijau */
        text-transform: uppercase;
        letter-spacing: 2px;
      }
      
      .fasilitas-card {
        background-color: #32cd32; /* Warna hijau terang */
        color: #000000; /* Teks hitam */
        text-align: center;
        padding: 1.5rem;
        border-radius: 8px;
        font-size: 1.2rem;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      
      .fasilitas-card:hover {
        transform: translateY(-5px); /* Efek hover */
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
      }
      /* Section Fasilitas */
      
      /* Biaya Pendidikan Section */
      .biaya-pendidikan h2 {
        font-size: 2rem;
        color: #008000; /* Hijau */
        text-transform: uppercase;
        letter-spacing: 2px;
      }
      
      /* Tabel */
      .biaya-table {
        border-collapse: collapse;
        width: 100%;
        text-align: left;
        margin-top: 2rem;
      }
      
      .biaya-table th,
      .biaya-table td {
        padding: 15px;
        border: 1px solid #ddd;
        font-size: 1rem;
      }
      
      .table-header {
        background-color: #004d00; /* Hijau Gelap */
        color: white;
        font-size: 1.2rem;
      }
      
      .table-subheader {
        background-color: #008000; /* Hijau */
        color: white;
      }
      
      .biaya-table tbody tr:nth-child(odd) {
        background-color: #ccffcc; /* Hijau Terang */
      }
      
      .biaya-table tbody tr:nth-child(even) {
        background-color: #e6ffe6; /* Hijau Lebih Terang */
      }
      
      .table-total {
        background-color: #004d00; /* Hijau Gelap */
        color: white;
        font-weight: bold;
      }
      
      .table-total td {
        font-size: 1.2rem;
      }
      
      /* Teks di Tabel */
      .biaya-table td {
        color: #333;
      }
      
      .biaya-table th {
        text-align: center;
        font-weight: bold;
      }
      /* Biaya Pendidikan */
      
      /* kegiatan */
      .kegiatan {
        background-color: #ffffff; /* Latar belakang putih */
        padding: 3rem 1rem;
      }
      
      .kegiatan h2 {
        font-size: 2rem;
        color: #008000; /* Hijau */
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
      }
      
      .kegiatan-item {
        display: flex;
        flex-direction: column;
        align-items: center; /* Horizontal center */
        justify-content: center; /* Vertical center */
        margin: 1rem 0;
        font-size: 1.2rem;
        font-weight: bold;
        color: #000; /* Teks hitam */
      }
      
      .kegiatan-bullet {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #32cd32; /* Hijau terang */
        margin-bottom: 10px; /* Memberi jarak dengan teks */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      }
      
      .row {
        display: flex;
        justify-content: center; /* Semua elemen di tengah */
        flex-wrap: wrap; /* Agar responsif */
      }
      /* kegiatan */
      
      /* Foto-foto Start*/
      .foto-foto {
        min-height: 100vh;
      }
      
      .container {
        max-width: 124rem;
        padding: 0 1rem;
        margin: 0 auto;
      }
      
      .text-center {
        text-align: center;
      }
      
      .section-heading {
        font-size: 3rem;
        color: var(--primary);
        padding: 2rem 0;
      }
      
      #tranding {
        padding: 4rem 0;
      }
      
      @media (max-width: 1440px) {
        #tranding {
          padding: 2rem 0;
        }
      }
      
      #tranding .tranding-slider {
        height: 40rem;
        padding: 2rem 0;
        position: relative;
      }
      
      @media (max-width: 500px) {
        #tranding .tranding-slider {
          height: 45rem;
        }
      }
      
      .tranding-slide {
        width: 20rem;
        height: 30rem;
        position: relative;
      }
      
      @media (max-width: 500px) {
        .tranding-slide {
          width: 28rem !important;
          height: 36rem !important;
        }
        .tranding-slide .tranding-slide-img img {
          width: 28rem !important;
          height: 36rem !important;
        }
      }
      
      .tranding-slide .tranding-slide-img img {
        width: 20rem;
        height: 30rem;
        border-radius: 1.5rem;
        object-fit: cover;
      }
      
      .tranding-slide .tranding-slide-content {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
      }
      
      .tranding-slide-content .food-price {
        position: absolute;
        top: 2rem;
        right: 2rem;
        color: var(--white);
      }
      
      .tranding-slide-content .tranding-slide-content-bottom {
        position: absolute;
        bottom: 2rem;
        left: 2rem;
        color: var(--white);
      }
      
      .food-rating {
        padding-top: 1rem;
        display: flex;
        gap: 1rem;
      }
      
      .rating ion-icon {
        color: var(--primary);
      }
      
      .swiper-slide-shadow-left,
      .swiper-slide-shadow-right {
        display: none;
      }
      
      .tranding-slider-control {
        position: relative;
        bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .tranding-slider-control .swiper-button-next {
        left: 58% !important;
        transform: translateX(-58%) !important;
      }
      
      @media (max-width: 990px) {
        .tranding-slider-control .swiper-button-next {
          left: 70% !important;
          transform: translateX(-70%) !important;
        }
      }
      
      @media (max-width: 450px) {
        .tranding-slider-control .swiper-button-next {
          left: 80% !important;
          transform: translateX(-80%) !important;
        }
      }
      
      @media (max-width: 990px) {
        .tranding-slider-control .swiper-button-prev {
          left: 30% !important;
          transform: translateX(-30%) !important;
        }
      }
      
      @media (max-width: 450px) {
        .tranding-slider-control .swiper-button-prev {
          left: 20% !important;
          transform: translateX(-20%) !important;
        }
      }
      
      .tranding-slider-control .slider-arrow {
        background: rgb(181, 181, 181);
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 50%;
        left: 42%;
        transform: translateX(-42%);
        filter: drop-shadow(0px 8px 24px rgba(18, 28, 53, 0.1));
      }
      
      .tranding-slider-control .slider-arrow ion-icon {
        font-size: 2rem;
        color: #222224;
      }
      
      .tranding-slider-control .slider-arrow::after {
        content: "";
      }
      
      .tranding-slider-control .swiper-pagination {
        position: relative;
        width: 15rem;
        bottom: 1rem;
      }
      
      .tranding-slider-control .swiper-pagination .swiper-pagination-bullet {
        filter: drop-shadow(0px 8px 24px rgba(18, 28, 53, 0.1));
      }
      
      .tranding-slider-control .swiper-pagination .swiper-pagination-bullet-active {
        background: var(--primary);
      }
      /* Foto-foto End*/
      
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
      
      .col-lg-4 h5 {
        font-family: "Inknut Antiqua", serif;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
      }
    </style>
  </head>
  <body>
    <!--hero start-->
    <section class="hero" id="home" style="background-image: url('{{ asset('Assets/img/hero-daycare.png') }}');">
      <main class="content"></main>
    </section>
    <!--hero end-->

    <!--About Daycare Start-->
    <section class="about-daycare container py-5" data-aos="fade-up">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img
            src="{{ asset('Assets/img/about-daycare.jpg') }}"
            alt="Anak-anak di Daycare Duta Firdaus"
            class="img-fluid rounded"
          />
        </div>
        <div class="col-md-6">
          <h2 class="text-center fw-bold mb-3" style="color: #ccff33">
            Tentang Daycare Duta Firdaus
          </h2>
          <div class="text-center mb-3">
            <img
              src="{{ asset('Assets/img/garis.png') }}"
              alt="Separator"
              style="width: 200px; height: auto"
            />
          </div>
          <p class="text-justify">
            Yayasan Baitush Sholihin Bandung Adalah Lembaga Yang Bergerak Dalam
            Bidang Pendidikan, Sosial & Kegamaan, Yayasan Baitush Sholihin
            Bandung Berdiri Pada Tahun 2014 Yang Beralamat Di Jalan Kanayan No
            344/15b Rt 07 Rw 08 Kelurahan Dago Kecamatan Coblong Kota Bandung.
          </p>
          <p class="text-justify">
            TPA/Daycare Tempat penitipan siswa dari usia 3 bulan sampai 6 tahun,
            jam operasionalnya dari jam 07.00 s.d 16.30
          </p>
        </div>
      </div>
    </section>
    <!--About Daycare End-->

    <!--Fasilitas Start-->
    <section class="fasilitas container py-5" data-aos="fade-up">
      <div class="text-center">
        <h2 class="fw-bold mb-3" style="color: #ccff33">FASILITAS</h2>
        <img
          src="{{ asset('Assets/img/garis.png') }}"
          alt="Separator"
          style="width: 200px; height: auto"
        />
      </div>
      <div class="row justify-content-center mt-4">
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Kamar per Usia</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Area Outdoor</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Ruang UKS</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Freezer Penyimpanan ASI</div>
        </div>
      </div>
    </section>
    <!--Fasilitas End-->

    <!--Biaya pendidikan Start-->
    <section class="biaya-pendidikan container py-5" data-aos="fade-up">
      <div class="text-center">
        <h2 class="fw-bold mb-3" style="color: #ccff33">BIAYA PENDIDIKAN</h2>
        <img
          src="{{ asset('Assets/img/garis.png') }}"
          alt="Separator"
          style="width: 200px; height: auto"
        />
      </div>
      <div class="table-responsive mt-4">
        <!-- TPA di Atas 2 Tahun -->
        <table class="table table-bordered biaya-table">
          <thead>
            <tr class="table-header">
              <th colspan="3" class="text-center">TPA DI ATAS 2 TAHUN</th>
            </tr>
            <tr class="text-center table-subheader">
              <th>NO</th>
              <th>URAIAN</th>
              <th>BIAYA</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Pendaftaran</td>
              <td>Rp. 150.000</td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>Sumbangan Pembinaan Pendidikan (SPP)</td>
              <td>Rp. 800.000</td>
            </tr>
            <tr>
              <td class="text-center">3</td>
              <td>Pengembangan Sekolah</td>
              <td>Rp. 1.000.000</td>
            </tr>
            <tr>
              <td class="text-center">4</td>
              <td>Kegiatan Pembelajaran Tahunan</td>
              <td>Rp. 650.000</td>
            </tr>
            <tr class="table-total">
              <td colspan="2" class="text-center">Total Biaya Masuk</td>
              <td>Rp. 2.600.000</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="table-responsive mt-4">
        <!-- TPA di Bawah 2 Tahun -->
        <table class="table table-bordered biaya-table">
          <thead>
            <tr class="table-header">
              <th colspan="3" class="text-center">TPA DI BAWAH 2 TAHUN</th>
            </tr>
            <tr class="text-center table-subheader">
              <th>NO</th>
              <th>URAIAN</th>
              <th>BIAYA</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Pendaftaran</td>
              <td>Rp. 150.000</td>
            </tr>
            <tr>
              <td class="text-center">2</td>
              <td>Sumbangan Pembinaan Pendidikan (SPP)</td>
              <td>Rp. 800.000</td>
            </tr>
            <tr>
              <td class="text-center">3</td>
              <td>Pengembangan Sekolah</td>
              <td>Rp. 1.000.000</td>
            </tr>
            <tr>
              <td class="text-center">4</td>
              <td>Kegiatan Pembelajaran Tahunan</td>
              <td>Rp. 500.000</td>
            </tr>
            <tr class="table-total">
              <td colspan="2" class="text-center">Total Biaya Masuk</td>
              <td>Rp. 2.450.000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <!--Biaya pendidikan End-->

    <!--Kegiatan Strat-->
    <section class="fasilitas container py-5" data-aos="fade-up">
      <div class="text-center">
        <h2 class="fw-bold mb-3" style="color: #ccff33">KEGIATAN</h2>
        <img
          src="{{ asset('Assets/img/garis.png') }}"
          alt="Separator"
          style="width: 200px; height: auto"
        />
      </div>
      <div class="row justify-content-center mt-4">
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Berbaris</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Membaca Doa Belajar</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Membaca Asmaul Husna</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Doa-doa Harian</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Murojaah Surat Pendek</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Kegiatan Inti (Sesuai tema)</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Makan Siang</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Tidur Siang</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Sholat Dzuhur</div>
        </div>
        <div class="col-md-4 col-sm-6 mb-3">
          <div class="fasilitas-card">Snack Time</div>
        </div>
      </div>
    </section>
    <!--Kegiatan End-->

    <!--Foto foto Start-->
    <section class="foto-foto" data-aos="zoom-in">
      <div id="tranding">
        <!-- <div class="container">
          <h3 class="text-center section-subheading">- popular Delivery -</h3>
          <h1 class="text-center section-heading">Tranding food</h1>
        </div> -->
        <div class="container">
          <div class="swiper tranding-slider">
            <div class="swiper-wrapper">
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (1).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (2).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (3).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (4).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (5).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (6).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
              <!-- Slide-start -->
              <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                  <img src="{{ asset('Assets/img/daycare/slide (7).jpg') }}" alt="Tranding" />
                </div>
                <div class="tranding-slide-content">
                  <h1 class="food-price"></h1>
                  <div class="tranding-slide-content-bottom">
                    <h2 class="food-name"></h2>
                    <h3 class="food-rating">
                      <span></span>
                      <div class="rating">
                        <!-- <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon> -->
                      </div>
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Slide-end -->
            </div>

            <div class="tranding-slider-control">
              <div class="swiper-button-prev slider-arrow">
                <ion-icon name="arrow-back-outline"></ion-icon>
              </div>
              <div class="swiper-button-next slider-arrow">
                <ion-icon name="arrow-forward-outline"></ion-icon>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Foto foto End-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
      var TrandingSlider = new Swiper(".tranding-slider", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        loop: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 100,
          modifier: 2.5,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
      AOS.init();
      feather.replace();
    </script>
  </body>
</x-app-layout>