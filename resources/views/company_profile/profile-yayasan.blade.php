<x-app-layout>
    <div id="carouselImages" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($images as $index => $image)
                <button type="button" data-bs-target="#carouselImages" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($images as $index => $image)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ $image }}" class="d-block w-100"
                        style="object-fit: cover; height: 600px; filter: brightness(0.7);" alt="Slideshow Image">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="d-flex flex-column align-items-start w-100" style="text-align: left;">
                            <h1>Profile Yayasan Baitush Sholihin Bandung</h1>
                            <h6>Bergerak dalam bidang pendidikan, sosial, dan keagamaan.</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="d-flex flex-column align-items-end mx-5 px-4 py-4">
        <main class="d-flex flex-column mt-4 w-100 text-black">
            <section>
                <h2 class="fs-2 fw-bold text-center">SEJARAH YAYASAN</h2>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-start mt-4 w-100 fs-5">
                    <div class="d-flex flex-column min-w-[240px] w-[634px]">
                        <p class="mt-3 fs-5">
                            Yayasan Baitush Sholihin Bandung adalah lembaga yang bergerak dalam bidang pendidikan, sosial, dan keagamaan. Yayasan Baitush Sholihin Bandung berdiri pada tahun 2014, beralamat di Jalan Kanayakan No. 344/15B RT 07 RW 08, Kelurahan Dago, Kecamatan Coblong, Kota Bandung.
                        </p>
                        <p class="mt-3 fs-5">
                            Yayasan Baitush Sholihin Bandung memiliki beberapa kegiatan, di antaranya Pendidikan Anak Usia Dini, Day Care, Taman Baca Masyarakat (TBM), pembinaan dan santunan kepada anak yatim dan dhuafa, pendidikan keagamaan, serta kegiatan sosial lainnya. Dalam bidang pendidikan, Yayasan Baitush Sholihin Bandung memiliki sekolah Day Care dan Kober yang beralamat di Jalan Kanayakan Dalam untuk Day Care dan Jalan Tubagus Ismail untuk lokasi pendidikan Kober dan TK.
                        </p>
                        <p class="mt-3 fs-5">
                            Dalam bidang keagamaan, Yayasan Baitush Sholihin Bandung memiliki majelis taklim dan pengajian anak-anak TPQ yang diselenggarakan di lokasi Yayasan Baitush Sholihin. Dalam rangka peningkatan mutu terhadap pengabdian kepada masyarakat sekitar, yayasan memiliki struktur organisasi yang terdiri atas ketua, pembina, pengawas, sekretaris, dan bendahara. Untuk memaksimalkan struktur organisasi, yayasan membentuk beberapa bidang, di antaranya bidang pendidikan, bidang sosial, bidang dakwah, bidang sarana, dan bidang humas.
                        </p>
                    </div>
                </div>
            </section>

            <section class="d-flex flex-column mt-4 w-100 text-black">
                <h2 class="fs-2 fw-bold text-center">VISI DAN MISI</h2>
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                    <div class="d-flex flex-column self-stretch my-auto min-w-[240px] w-[507px]">
                        <h3 class="fs-4 fw-bold">VISI:</h3>
                        <p class="mt-3 fs-5">
                            “Menjadi lembaga sosial kemanusiaan yang inovatif, kreatif, dan berperan secara aktif dalam kepedulian terhadap sesama sehingga tercipta kehidupan yang selaras dan harmonis”.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                    <div class="d-flex flex-column self-stretch my-auto min-w-[240px] w-[507px]">
                        <h3 class="fs-4 fw-bold">MISI:</h3>
                        <ul class="fs-5">
                            <li>
                                Menyelenggarakan kegiatan sosial yang sangat dibutuhkan oleh masyarakat (fakir & miskin)
                            </li>
                            <li>
                                Memberikan pelayanan kepada masyarakat tanpa membedakan suku, agama, rasa dan golongan
                            </li>
                            <li>
                                Merutinkan program bantuan kepada masyarakat yang membutuhkan
                            </li>
                            <li>
                                Membantu masyarakat yang sangat membutuhkan bantuan
                            </li>
                            <li>
                                Mengelola setiap karya secara transparan, tertib, jujur dan bertanggung jawab dengan semangat solidaritas
                            </li>
                            <li>
                                Meningkatkan kompetensi sumber daya manusia yang berkesinambungan
                            </li>
                            <li>
                                Menggerakkan dan melibatkan masyarakat untuk peduli dan berbagi
                            </li>
                            <li>
                                Mengadakan program pelatihan kerja gratis bagi masyarakat yang tidak mampu
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="d-flex flex-column mt-4 w-100 text-black">
                <h2 class="fs-2 fw-bold text-center">GURU DAN STAFF</h2>
                <div class="d-flex flex-column align-items-center mt-4 w-100">
                    <article class="d-flex flex-wrap justify-content-center align-items-start px-2.5 py-3 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                        <div class="container-fluid d-flex flex-row grow shrink min-w-[240px] w-auto">
                            <div class="row justify-content-center">
                                <div class="col-xl-4">
                                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c5050d44dce6d56619855b5be3d0d8d5cb56f199ef05c6af8227dcb892826948?placeholderIfAbsent=true&apiKey=b04a243b041e43f6921bc056bd3d8dab"
                                        alt="Portrait of Mohamad Agus Solihin"
                                        class="img-fluid rounded float-start me-3" style="max-width: 100%;"/>
                                </div>
                                <div class="col-xl-8">
                                    <h3 class="fs-4 fw-bold">MOHAMAD AGUS SOLIHIN</h3>
                                    <h6 class="fs-4">
                                        Ketua Yayasan Baitush Sholihin Bandung
                                    </h6>
                                    <p class="mt-3 fs-5">
                                        Kami berkomitmen membina dan mengembangkan dakwah serta pendidikan Islam untuk menciptakan masyarakat berakhlak mulia, berilmu, dan sejahtera lahir batin. Dengan menjunjung prinsip amar makruf nahi munkar serta nilai-nilai kemanusiaan, kami aktif meningkatkan kualitas sumber daya manusia agar terbentuk generasi bertaqwa, modern, dan profesional.
                                    </p>
                                    <p class="mt-3 fs-5">
                                        Melalui berbagai kegiatan, kami mendukung peningkatan keimanan, penguasaan ilmu, dan teknologi. Fokus kami adalah mendidik anak-anak, pemuda, dan masyarakat untuk mewujudkan lingkungan madani, serta mendirikan lembaga dakwah, pendidikan, dan sosial yang modern dan berkualitas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mt-4 w-100 text-black">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                                <!-- Staff profile cards -->
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Sri Wahyuni Sholihah.png') }}"
                                                 class="card-img-top"
                                                 alt="Sri Wahyuni, S"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Sri Wahyuni, S</h5>
                                            <p class="card-text fs-6">Kepala Sekolah TPA</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Ema Kusmiati.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Ema Kusmiati"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Ema Kusmiati</h5>
                                            <p class="card-text fs-6">Guru & Bendahara TPA</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Repeat the same structure for other staff members -->
                                <!-- Example for one more card -->
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Nenur Dahyati.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Nenur Dahyati"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Nenur Dahyati</h5>
                                            <p class="card-text fs-6">Guru TPA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Ade Suparman.jpg') }}"
                                                 class="card-img-top"
                                                 alt="Ade Suparman"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Ade Suparman</h5>
                                            <p class="card-text fs-6">Guru & Operator Yayasan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Euis Kartika.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Euis Kartika"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Euis Kartika</h5>
                                            <p class="card-text fs-6">Guru & Bendahara Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Titin Sumarni.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Titin Sumarni"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Titin Sumarni</h5>
                                            <p class="card-text fs-6">Guru & Kepala Sekolah Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Suci Pebrianti.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Suci Pebrianti"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Suci Pebrianti</h5>
                                            <p class="card-text fs-6">Operator & Administrator Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-img-wrapper" style="height: 300px; overflow: hidden;">
                                            <img src="{{ asset('Assets/foto-guru/Dea Rizki Shifany.jpeg') }}"
                                                 class="card-img-top"
                                                 alt="Dea Rizki Shifany"
                                                 style="width: 100%; height: 100%; object-fit: cover; object-position: center;">
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-start">
                                            <h5 class="card-title fw-bold">Dea Rizki Shifany</h5>
                                            <p class="card-text fs-6">Guru & Administrator TPA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

        </main>
    </section>
</x-app-layout>
