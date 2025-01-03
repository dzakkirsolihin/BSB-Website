<x-app-layout>
    <x-image-carousel :images="$images" :delay="3000"/>
    <section class="d-flex flex-column align-items-end mx-5 px-4 py-4">
        <main class="d-flex flex-column mt-4 w-100 text-black">
            <section>
                <h2 class="fs-2 fw-bold text-center">SEJARAH YAYASAN</h2>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-start mt-4 w-100 fs-5">
                    {{--
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/3224313e73386f3cf421e1de1216989de815f6aff73f001b7b230aa88f6e813b?placeholderIfAbsent=true&apiKey=b04a243b041e43f6921bc056bd3d8dab"
                        alt="Historical image of Yayasan Baitush Sholihin"
                        class="object-contain rounded-3 aspect-[1.78] min-w-[240px] w-[560px]"
                    />
                    --}}
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
                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Sri Wahyuni, S">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Sri Wahyuni, S</h5>
                                            <p class="card-text fs-6">Kepala Sekolah TPA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Ema Kusmiati">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Ema Kusmiati</h5>
                                            <p class="card-text fs-6">Guru & Bendahara TPA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Nenur Dahyati">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Nenur Dahyati</h5>
                                            <p class="card-text fs-6">Guru TPA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Ade Suparman">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Ade Suparman</h5>
                                            <p class="card-text fs-6">Guru & Operator Yayasan & TPA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Euis Kartika">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Euis Kartika</h5>
                                            <p class="card-text fs-6">Guru & Bendahara Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Titin Sumarni">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Titin Sumarni</h5>
                                            <p class="card-text fs-6">Guru & Kepala Sekolah Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Suci Pebrianti">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Suci Pebrianti</h5>
                                            <p class="card-text fs-6">Operaor & Administrasi Kober</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="..." class="card-img-top" alt="Dea Rizki Shifany">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">Dea Rizki Shifany</h5>
                                            <p class="card-text fs-6">Guru & Bagian Administrasi TPA</p>
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
