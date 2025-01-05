<x-app-layout>
  <!-- Hero Section -->
  <section class="position-relative vh-100 d-flex align-items-center" style="background: linear-gradient(rgba(0,128,0,0.7), rgba(0,0,0,0.5)), url('{{ asset('Assets/img/hero-tk.png') }}') center/cover no-repeat;">
      <div class="container text-center text-white">
      </div>
  </section>

  <!-- About Section -->
  <section class="py-5 bg-light">
      <div class="container">
          <div class="row align-items-center g-5">
              <div class="col-lg-6" data-aos="fade-right">
                  <img src="{{ asset('Assets/img/hero.JPG') }}" alt="TK Duta Firdaus" class="img-fluid rounded-3 shadow-lg">
              </div>
              <div class="col-lg-6" data-aos="fade-left">
                  <h2 class="display-5 fw-bold text-success mb-4">Tentang TK Duta Firdaus</h2>
                  <p class="lead text-muted">Kami menyediakan pendidikan berkualitas untuk anak usia dini dengan kurikulum terpadu yang menggabungkan pendidikan umum dan nilai-nilai islami.</p>
                  <div class="mt-4">
                      <div class="d-flex align-items-center mb-3">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Jam operasional: 08.00 - 11.00 WIB</p>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Untuk anak usia 3-4 tahun</p>
                      </div>
                      <div class="d-flex align-items-center">
                          <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                          <p class="mb-0">Guru berpengalaman dan profesional</p>
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
              @foreach([
                  'Ruang Kelas',
                  'Ruang Perpustakaan',
                  'Ruang Aula',
                  'Tempat Bermain Anak',
                  'Mushola',
                  'Ruang Tidur Anak',
                  'Televisi Pembelajaran'
              ] as $facility)
              <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <div class="card h-100 border-0 shadow-sm text-center hover-card">
                      <div class="card-body">
                          <i class="bi bi-building text-success fs-1 mb-3"></i>
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
              <!-- Halfday TK -->
              <div class="col-lg-6" data-aos="fade-right">
                  <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-success text-white py-3">
                          <h3 class="card-title h4 text-center mb-0">HALFDAY TK</h3>
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
                                          <td class="text-end">Rp. 125.000</td>
                                      </tr>
                                      <tr>
                                          <td>Pengembangan Sekolah</td>
                                          <td class="text-end">Rp. 400.000</td>
                                      </tr>
                                      <tr>
                                          <td>Kegiatan Pembelajaran Tahunan</td>
                                          <td class="text-end">Rp. 800.000</td>
                                      </tr>
                                      <tr>
                                          <td>Seragam (3 stel)</td>
                                          <td class="text-end">Rp. 400.000</td>
                                      </tr>
                                      <tr class="table-success fw-bold">
                                          <td>Total Biaya Masuk</td>
                                          <td class="text-end">Rp. 1.875.000</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Fullday TK -->
              <div class="col-lg-6" data-aos="fade-left">
                  <div class="card h-100 border-0 shadow-sm">
                      <div class="card-header bg-success text-white py-3">
                          <h3 class="card-title h4 text-center mb-0">FULLDAY TK</h3>
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
                                          <td class="text-end">Rp. 800.000</td>
                                      </tr>
                                      <tr>
                                          <td>Seragam (3 stel)</td>
                                          <td class="text-end">Rp. 400.000</td>
                                      </tr>
                                      <tr class="table-success fw-bold">
                                          <td>Total Biaya Masuk</td>
                                          <td class="text-end">Rp. 3.150.000</td>
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
          <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              @foreach([
                  'Cooking Class',
                  'Outing Class',
                  'Posyandu',
                  'Family Gathering',
                  'Entrepreneurship',
                  'Murojaah Hafalan',
                  'Panggung Cerita',
                  'Pemeriksaan Kesehatan',
                  'Parenting Class'
              ] as $activity)
              <div class="col" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                  <div class="card h-100 border-0 shadow-sm text-center hover-card">
                      <div class="card-body">
                          <i class="bi bi-calendar-event text-success fs-1 mb-3"></i>
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
              @for($i = 1; $i <= 7; $i++)
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                  <div class="card border-0 shadow-sm">
                      <img src="{{ asset('Assets/img/tk/slide' . $i . '.jpg') }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="Gallery Image {{ $i }}">
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