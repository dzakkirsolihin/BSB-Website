<x-app-layout>
    <!-- Hero Carousel -->
    <div class="position-relative">
        <x-image-carousel :images="$images" :delay="3000"/>
        <div class="position-absolute top-50 start-50 translate-middle text-white text-center">
            <h1 class="display-4 fw-bold mb-3">Profile Yayasan Baitush Sholihin Bandung</h1>
            <h5 class="fw-light">Bergerak dalam bidang pendidikan, sosial, dan keagamaan.</h5>
        </div>
    </div>

    <div class="container py-5">
        <!-- Sejarah Section -->
        <section class="mb-5" data-aos="fade-up">
            <h2 class="display-5 text-center fw-bold text-success mb-4">SEJARAH YAYASAN</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <p class="lead text-muted mb-3">
                                Yayasan Baitush Sholihin Bandung adalah lembaga yang bergerak dalam bidang pendidikan, sosial, dan keagamaan. Yayasan Baitush Sholihin Bandung berdiri pada tahun 2014, beralamat di Jalan Kanayakan No. 344/15B RT 07 RW 08, Kelurahan Dago, Kecamatan Coblong, Kota Bandung.
                            </p>
                            <p class="lead text-muted mb-3">
                                Yayasan Baitush Sholihin Bandung memiliki beberapa kegiatan, di antaranya Pendidikan Anak Usia Dini, Day Care, Taman Baca Masyarakat (TBM), pembinaan dan santunan kepada anak yatim dan dhuafa, pendidikan keagamaan, serta kegiatan sosial lainnya.
                            </p>
                            <p class="lead text-muted">
                                Dalam bidang keagamaan, Yayasan Baitush Sholihin Bandung memiliki majelis taklim dan pengajian anak-anak TPQ yang diselenggarakan di lokasi Yayasan Baitush Sholihin.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi Misi Section -->
        <section class="mb-5" data-aos="fade-up">
            <h2 class="display-5 text-center fw-bold text-success mb-4">VISI DAN MISI</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h4 fw-bold text-success mb-3">VISI:</h3>
                            <p class="card-text">
                                "Menjadi lembaga sosial kemanusiaan yang inovatif, kreatif, dan berperan secara aktif dalam kepedulian terhadap sesama sehingga tercipta kehidupan yang selaras dan harmonis".
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h4 fw-bold text-success mb-3">MISI:</h3>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Menyelenggarakan kegiatan sosial yang sangat dibutuhkan oleh masyarakat</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Memberikan pelayanan kepada masyarakat tanpa diskriminasi</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Merutinkan program bantuan kepada masyarakat yang membutuhkan</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Mengelola setiap karya secara transparan dan bertanggung jawab</li>
                                <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Meningkatkan kompetensi sumber daya manusia berkelanjutan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Guru dan Staff Section -->
        <section data-aos="fade-up">
            <h2 class="display-5 text-center fw-bold text-success mb-4">GURU DAN STAFF</h2>
            
            <!-- Ketua Yayasan Card -->
            <div class="card mb-5 border-0 shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('Assets/foto-guru/Mohamad Agus Solihin.jpg') }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="Ketua Yayasan">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title h4 fw-bold text-success">MOHAMAD AGUS SOLIHIN</h3>
                            <p class="card-subtitle mb-3 text-muted">Ketua Yayasan Baitush Sholihin Bandung</p>
                            <p class="card-text">
                                Kami berkomitmen membina dan mengembangkan dakwah serta pendidikan Islam untuk menciptakan masyarakat berakhlak mulia, berilmu, dan sejahtera lahir batin.
                            </p>
                            <p class="card-text">
                                Melalui berbagai kegiatan, kami mendukung peningkatan keimanan, penguasaan ilmu, dan teknologi. Fokus kami adalah mendidik anak-anak, pemuda, dan masyarakat untuk mewujudkan lingkungan madani.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Staff Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @php
                    $staff = [
                        ['name' => 'Sri Wahyuni, S', 'position' => 'Kepala Sekolah TPA', 'image' => 'Assets/foto-guru/Sri Wahyuni Sholihah.png'],
                        ['name' => 'Ema Kusmiati', 'position' => 'Guru & Bendahara TPA', 'image' => 'Assets/foto-guru/Ema Kusmiati.jpeg'],
                        ['name' => 'Nenur Dahyati', 'position' => 'Guru TPA', 'image' => 'Assets/foto-guru/Nenur Dahyati.jpeg'],
                        ['name' => 'Ade Suparman', 'position' => 'Guru & Operator Yayasan', 'image' => 'Assets/foto-guru/Ade Suparman.jpg'],
                        ['name' => 'Euis Kartika', 'position' => 'Guru & Bendahara Kober', 'image' => 'Assets/foto-guru/Euis Kartika.jpeg'],
                        ['name' => 'Titin Sumarni', 'position' => 'Guru & Kepala Sekolah Kober', 'image' => 'Assets/foto-guru/Titin Sumarni.jpeg'],
                        ['name' => 'Suci Pebrianti', 'position' => 'Operator & Administrator Kober', 'image' => 'Assets/foto-guru/Suci Pebrianti.jpeg'],
                        ['name' => 'Dea Rizki Shifany', 'position' => 'Guru & Administrator TPA', 'image' => 'Assets/foto-guru/Dea Rizki Shifany.jpeg']
                    ];
                @endphp

                @foreach($staff as $member)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset($member['image']) }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="{{ $member['name'] }}">
                                <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 p-3">
                                    <h5 class="card-title text-white mb-1">{{ $member['name'] }}</h5>
                                    <p class="card-text text-white-50 small mb-0">{{ $member['position'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</x-app-layout>