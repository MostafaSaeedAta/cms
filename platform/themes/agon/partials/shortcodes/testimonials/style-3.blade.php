<section class="section-box mt-100">
    <div class="container text-center">
        <h3 class="text-heading-1 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h3>
        <p class="text-body-lead-large color-gray-600 mt-30">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
    </div>
    <div class="container mt-70">
        <div class="row">
            @foreach ($testimonials as $testimonial)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card-grid-style-3 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration * 2 - 1 }}s">
                        <div class="grid-3-img">
                            <img src="{{ RvMedia::getImageUrl($testimonial->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $testimonial->name }}">
                        </div>
                        <h3 class="text-heading-6 mb-5 mt-20">{{ $testimonial->name }}</h3>
                        <span class="text-body-small d-block">{{ $testimonial->company }}</span>
                        <div class="text-body-text text-desc color-gray-500 mt-20">{!! BaseHelper::clean($testimonial->content) !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
