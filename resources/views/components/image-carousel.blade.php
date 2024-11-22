<div id="carouselImages" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($images as $index => $image)
            <button type="button" data-bs-target="#carouselImages" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach ($images as $index => $image)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <img src="{{ $image }}" class="d-block w-100 img-fluid" style="object-fit: cover; aspect-ratio: 33/15; filter: brightness(0.5);" alt="Slideshow Image">
                <div class="carousel-caption d-none d-md-block bottom-50">
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
