<footer class="py-4 mt-4" style="background-color: #008000;">
    <div class="container-fluid w-100 d-flex justify-content-center">
        <div class="row d-flex justify-content-center gap-5">
            <div class="col-md-7 d-flex flex-row align-items-center gap-3">
                <div class="me-5 pe-5">
                    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('index') }}">
                        <x-application-logo class="d-inline-block align-text-top me-2" width="150" height="150" />
                    </a>
                </div>
                <div class="d-flex flex-column me-5 pe-5">
                    <h2 style="color: #ccff33;" class="fs-5">YAYASAN BAITUSH SHOLIHIN</h2>
                    <address class="text-white fs-6">
                        <p class="mb-0">Jl. Kanayakan No.344/15b, Dago, Kecamatan Coblong, Kota Bandung, Jawa Barat
                            40135</p>
                        <p class="mb-0">Telp.<br />(022) 2512386<br />(+62) 82130639827</p>
                    </address>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-row gap-5">
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <p class="text-white fs-5 fw-bold mb-3">QUICK LINKS</p>
                            <ul class="text-white d-flex flex-column list-unstyled gap-2">
                                <li>
                                    <x-nav-link :href="route('index')">
                                        {{ __('HOME') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('profile-yayasan')">
                                        {{ __('PROFILE') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link>
                                        {{ __('DAYCARE') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link>
                                        {{ __('TK') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('program-unggulan')">
                                        {{ __('PROGRAM UNGGULAN') }}
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('faq')">
                                        {{ __('FAQ') }}
                                    </x-nav-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-column">
                            <p class="text-white fs-5 fw-bold mb-3">SOSIAL MEDIA</p>
                            <div class="d-flex flex-column gap-3 justify-content-between align-items-start">
                                <a href="http://wa.me/+6282130639827" aria-label="Visit our WhatsApp page"
                                    class="icon-link icon-link-hover link-light" target="_blank">
                                    <i class="bi bi-whatsapp fs-2"></i>
                                </a>
                                <a href="https://www.instagram.com/koberdutaf_tahfidzpreneur/profilecard/?igsh=MXZkdjJtcGNod2xm"
                                    aria-label="Visit our Instagram page" class="icon-link icon-link-hover link-light"
                                    target="_blank">
                                    <i class="bi bi-instagram fs-2"></i>
                                </a>
                                <a href="https://www.tiktok.com/@tpa.duta.firdaus?_t=8qhMiItHbv8&_r=1"
                                    aria-label="Visit our TikTok page" class="icon-link icon-link-hover link-light"
                                    target="_blank">
                                    <i class="bi bi-tiktok fs-2"></i>
                                </a>
                                <a href="https://www.youtube.com/@paudtahfidzpreneurdutafird6574"
                                    aria-label="Visit our YouTube page" class="icon-link icon-link-hover link-light"
                                    target="_blank">
                                    <i class="bi bi-youtube fs-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-center text-white py-3 fw-bold" style="background-color: #006400;">
    Yayasan Baitush Sholihin &copy;2024. All Rights Reserved.
</div>
