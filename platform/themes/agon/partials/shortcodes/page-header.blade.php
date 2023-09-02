<section class="section-box">
    <div class="banner-hero banner-breadcrums" @if ($shortcode->bg_color) style="background-color: {{ $shortcode->bg_color }};" @endif>
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <h1 class="text-heading-2 color-gray-1000 mb-20">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-text color-gray-500">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
