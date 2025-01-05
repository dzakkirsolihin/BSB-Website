<x-app-layout>
  <!-- Hero Section -->
  <section class="position-relative vh-100 d-flex align-items-center" style="background: linear-gradient(rgba(0,128,0,0.7), rgba(0,0,0,0.5)), url('{{ asset('Assets/img/hero-daycare.png') }}') center/cover no-repeat;">
      <div class="container text-center text-white">
      </div>
  </section>

  <!-- About Section -->
  <section class="py-5 bg-light">
      <div class="container">
          <div class="row align-items-center g-5">
              <div class="col-lg-6" data-aos="fade-right">
                  <img src="{{ asset('Assets/img/about-daycare.jpg') }}" alt="Anak-anak di Daycare" class="img-fluid rounded-3 shadow-lg">
              </div>
              <div class="col-lg-6" data-aos="fade-left">
                  <h2 class="display-5 fw-bold text-success mb-4">Tentang Daycare Duta Firdaus</h2>
                  <p class="lead text-muted">Kami menyediakan layanan penitipan anak dengan standar pendidikan berkualitas dan pengasuhan yang penuh kasih sayang.</p>
                  <div class="mt-4">
                      <div class="d-flex align-items-center mb-3">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Jam operasional: 07.00 - 16.30 WIB</p>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Untuk anak usia 3 bulan - 6 tahun</p>
                      </div>
                      <div class="d-flex align-items-center">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Pengasuh profesional dan berpengalaman</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Facilities Section -->
  <section class="py-5">
      <div class="container">
          <h2 class="display-5 text-center fw-bold text-success mb-5" data-aos="fade-up">FASILITAS KAMI</h2>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
              @foreach(['Kamar per Usia', 'Area Outdoor', 'Ruang UKS', 'Freezer Penyimpanan ASI'] as $facility)
              <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <div class="card h-100 border-0 shadow-sm text-center hover-card">
                      <div class="card-body">
                          <i class="bi bi-house-heart text-success fs-1 mb-3"></i>
                          <h5 class="card-title fw-bold">{{ $facility }}</h5>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>

  <!-- Pricing Section -->
  <section class="py-5 bg-light">
      <div class="container">
          <h2 class="display-5 text-center fw-bold text-success mb-5" data-aos="fade-up">BIAYA PENDIDIKAN</h2>
          <div class="row g-4">
              <!-- TPA di Atas 2 Tahun -->
              <div class="col-lg-6" data-aos="fade-right">
                  <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-success text-white py-3">
                          <h3 class="card-title h4 text-center mb-0">TPA DI ATAS 2 TAHUN</h3>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <tbody>
                                      <tr>
                                          <td>Pendaftaran</td>
                                          <td class="text-end">Rp. 150.000</td>
                                      </tr>
                                      <tr>
                                          <td>SPP</td>
                                          <td class="text-end">Rp. 800.000</td>
                                      </tr>
                                      <tr>
                                          <td>Pengembangan Sekolah</td>
                                          <td class="text-end">Rp. 1.000.000</td>
                                      </tr>
                                      <tr>
                                          <td>Kegiatan Pembelajaran Tahunan</td>
                                          <td class="text-end">Rp. 650.000</td>
                                      </tr>
                                      <tr class="table-success fw-bold">
                                          <td>Total Biaya Masuk</td>
                                          <td class="text-end">Rp. 2.600.000</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- TPA di Bawah 2 Tahun -->
              <div class="col-lg-6" data-aos="fade-left">
                  <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-success text-white py-3">
                          <h3 class="card-title h4 text-center mb-0">TPA DI BAWAH 2 TAHUN</h3>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hover">
                                  <tbody>
                                      <tr>
                                          <td>Pendaftaran</td>
                                          <td class="text-end">Rp. 150.000</td>
                                      </tr>
                                      <tr>
                                          <td>SPP</td>
                                          <td class="text-end">Rp. 800.000</td>
                                      </tr>
                                      <tr>
                                          <td>Pengembangan Sekolah</td>
                                          <td class="text-end">Rp. 1.000.000</td>
                                      </tr>
                                      <tr>
                                          <td>Kegiatan Pembelajaran Tahunan</td>
                                          <td class="text-end">Rp. 500.000</td>
                                      </tr>
                                      <tr class="table-success fw-bold">
                                          <td>Total Biaya Masuk</td>
                                          <td class="text-end">Rp. 2.450.000</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Activities Section -->
  <section class="py-5">
      <div class="container">
          <h2 class="display-5 text-center fw-bold text-success mb-5" data-aos="fade-up">KEGIATAN KAMI</h2>
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
              @foreach([
                  'Berbaris',
                  'Membaca Doa Belajar',
                  'Membaca Asmaul Husna',
                  'Doa-doa Harian',
                  'Murojaah Surat Pendek',
                  'Kegiatan Inti',
                  'Makan Siang',
                  'Tidur Siang'
              ] as $activity)
              <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <div class="card h-100 border-0 shadow-sm text-center hover-card">
                      <div class="card-body">
                          <i class="bi bi-calendar-check text-success fs-1 mb-3"></i>
                          <h5 class="card-title fw-bold">{{ $activity }}</h5>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>

  <!-- Gallery Section -->
  <section class="py-5 bg-light">
      <div class="container">
          <h2 class="display-5 text-center fw-bold text-success mb-5" data-aos="fade-up">GALERI KEGIATAN</h2>
          <div class="row g-4">
              @for($i = 1; $i <= 6; $i++)
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                  <div class="card border-0 shadow-sm">
                      <img src="{{ asset('Assets/img/daycare/slide (' . $i . ').jpg') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Gallery Image {{ $i }}">
                  </div>
              </div>
              @endfor
          </div>
      </div>
  </section>

  <style>
      .hover-card {
          transition: transform 0.3s ease;
      }
      .hover-card:hover {
          transform: translateY(-5px);
      }
  </style>

  <script>
      AOS.init({
          duration: 1000,
          once: true
      });
  </script>
</x-app-layout>