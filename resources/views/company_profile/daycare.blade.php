<x-app-layout>
  <head>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/daycare-style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Daycare Duta Firdaus</title>
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