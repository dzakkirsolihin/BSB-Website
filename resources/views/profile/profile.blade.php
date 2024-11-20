<x-app-layout>
    <x-image-carousel :images="$images" :delay="3000"/>
    <section class="d-flex flex-column align-items-end px-4 py-5">
        <main class="d-flex flex-column mt-4 w-100 text-black">
            <section>
                <h2 class="fs-2 fw-bold text-center">SEJARAH YAYASAN</h2>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-start mt-4 w-100 fs-4">
                    {{--
                    <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/3224313e73386f3cf421e1de1216989de815f6aff73f001b7b230aa88f6e813b?placeholderIfAbsent=true&apiKey=b04a243b041e43f6921bc056bd3d8dab"
                        alt="Historical image of Yayasan Baitush Sholihin"
                        class="object-contain rounded-3 aspect-[1.78] min-w-[240px] w-[560px]"
                    />
                    --}}
                    <div class="d-flex flex-column min-w-[240px] w-[634px]">
                        <p class="mt-3 fs-4">
                            Yayasan Baitush Sholihin Bandung adalah lembaga yang bergerak dalam bidang pendidikan, sosial, dan keagamaan. Yayasan Baitush Sholihin Bandung berdiri pada tahun 2014, beralamat di Jalan Kanayakan No. 344/15B RT 07 RW 08, Kelurahan Dago, Kecamatan Coblong, Kota Bandung.
                        </p>
                        <p class="mt-3 fs-4">
                            Yayasan Baitush Sholihin Bandung memiliki beberapa kegiatan, di antaranya Pendidikan Anak Usia Dini, Day Care, Taman Baca Masyarakat (TBM), pembinaan dan santunan kepada anak yatim dan dhuafa, pendidikan keagamaan, serta kegiatan sosial lainnya. Dalam bidang pendidikan, Yayasan Baitush Sholihin Bandung memiliki sekolah Day Care dan Kober yang beralamat di Jalan Kanayakan Dalam untuk Day Care dan Jalan Tubagus Ismail untuk lokasi pendidikan Kober dan TK.
                        </p>
                        <p class="mt-3 fs-4">
                            Dalam bidang keagamaan, Yayasan Baitush Sholihin Bandung memiliki majelis taklim dan pengajian anak-anak TPQ yang diselenggarakan di lokasi Yayasan Baitush Sholihin. Dalam rangka peningkatan mutu terhadap pengabdian kepada masyarakat sekitar, yayasan memiliki struktur organisasi yang terdiri atas ketua, pembina, pengawas, sekretaris, dan bendahara. Untuk memaksimalkan struktur organisasi, yayasan membentuk beberapa bidang, di antaranya bidang pendidikan, bidang sosial, bidang dakwah, bidang sarana, dan bidang humas.
                        </p>
                    </div>
                </div>
            </section>

            <section class="d-flex flex-column mt-4 w-100 text-black">
                <h2 class="fs-2 fw-bold text-center">VISI DAN MISI</h2>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-center px-4 py-3 mt-4 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                    <div class="d-flex flex-column self-stretch my-auto min-w-[240px] w-[507px]">
                        <h3 class="fs-4 fw-bold">VISI:</h3>
                        <p class="mt-3 fs-4"">
                            “Menjadi lembaga sosial kemanusiaan yang inovatif, kreatif, dan berperan secara aktif dalam kepedulian terhadap sesama sehingga tercipta kehidupan yang selaras dan harmonis”.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-5 justify-content-between align-items-center px-4 py-3 mt-4 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                    <div class="d-flex flex-column self-stretch my-auto min-w-[240px] w-[507px]">
                        <h3 class="fs-4 fw-bold">MISI:</h3>
                        <ul class="fs-4">
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
                    <article class="d-flex flex-wrap gap-5 justify-content-center align-items-start px-2.5 py-3 w-100 bg-white rounded-3 shadow-[0px_0px_10px_rgba(0,0,0,0.25)]">
                        {{--
                        <img
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/c5050d44dce6d56619855b5be3d0d8d5cb56f199ef05c6af8227dcb892826948?placeholderIfAbsent=true&apiKey=b04a243b041e43f6921bc056bd3d8dab"
                            alt="Portrait of Mohamad Agus Solihin"
                            class="object-contain grow shrink w-auto aspect-[0.89] min-w-[240px]"
                        />
                        --}}
                        <div class="d-flex flex-column grow shrink min-w-[240px] w-auto">
                            <header>
                                <h3 class="fs-4 fw-bold">MOHAMAD AGUS SOLIHIN</h3>
                                <p class="fs-4">
                                    Ketua Yayasan Baitush Sholihin Bandung
                                </p>
                            </header>
                            <p class="mt-3 fs-4">
                                Kami berkomitmen untuk membina dan mengembangkan dakwah serta pendidikan Islam sebagai upaya menciptakan masyarakat yang berakhlak dan berilmu. Dalam melaksanakan tugas, kami berperan aktif dan bekerjasama dalam mengamalkan prinsip amar makruf dan nahi munkar, serta menegakkan nilai-nilai kemanusiaan yang sesuai dengan ajaran Islam demi kesejahteraan bangsa, baik lahir maupun batin. Selain itu, kami juga berupaya meningkatkan kualitas sumber daya manusia dengan tujuan membentuk masyarakat yang bertaqwa, modern, dan profesional. Hal ini kami wujudkan melalui berbagai kegiatan yang mendukung peningkatan keimanan, ketaqwaan, serta penguasaan pengetahuan dan teknologi.
                            </p>
                            <p class="mt-3 fs-4">
                                Tujuan utama kami adalah mendidik anak-anak, pemuda, dan masyarakat umum agar terbentuk generasi yang berakhlak mulia dan berilmu, sehingga menciptakan lingkungan yang madani. Selain itu, kami juga fokus pada pendirian dan pengembangan lembaga dakwah, pendidikan, dan sosial yang modern serta profesional.
                            </p>
                            <p class="mt-3 fs-4">
                                Dalam cita-cita kami, kami berkomitmen membina dan mengembangkan pendidikan Islam. Kami juga berupaya meningkatkan mutu dan menyebarkan syiar Islam melalui pendidikan, dakwah, bimbingan ibadah, seni budaya, dan berbagai kegiatan lainnya yang mendukung kemajuan umat secara menyeluruh.
                            </p class="mt-3 fs-4">
                        </div>
                    </article>
                    <div class="d-flex flex-wrap gap-2.5 justify-content-center align-items-center mt-4 fs-4 fw-bold text-center">
                    </div>
                </div>
            </section>
        </main>
    </section>

</x-app-layout>
