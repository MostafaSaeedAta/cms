<section class="bg-light py-5 py-xl-8">
    <div class="container overflow-hidden">
        <div class="row gy-5 gy-lg-0 align-items-lg-center justify-content-lg-between">
            <div class="col-12 col-lg-6 order-1 order-lg-0">
                @if ($shortcode->title)
                    <h1 class="display-3 fw-bold mb-3">{{ $shortcode->title }}</h1>
                @endif
                @if ($shortcode->title)

                <p class="fs-4 mb-5">{{ $shortcode->text }}</p>
                @endif
                {{-- <div class="d-grid gap-2 d-sm-flex">
                    <button type="button" class="btn btn-primary btn-2xl rounded-pill px-4 gap-3">Explore Now</button>
                    <button type="button" class="btn btn-outline-primary btn-2xl rounded-pill px-4">Free Trial</button>
                </div> --}}
            </div>
            <div class="col-12 col-lg-5 text-center">
                <div class="position-relative">
                    <div
                        class="bsb-circle border border-4 border-warning position-absolute top-50 start-10 translate-middle z-1">
                    </div>
                    <div class="bsb-circle bg-primary position-absolute top-50 start-50 translate-middle"
                        style="--bsb-cs: 460px;"></div>
                    <div class="bsb-circle border border-4 border-warning position-absolute top-10 end-0 z-1"
                        style="--bsb-cs: 100px;"></div>
                    @if ($shortcode->bg_image_1)
                    <img class="img-fluid position-relative z-2" loading="lazy" alt="{{ $shortcode->subtitle ?: $shortcode->bg_image_1 }}" src="{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
