<section class="section-box mt-70 shop-bottom-banner">
    <div class="container">
        <div class="box-green box-green-2 bdr-18">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h3 class="text-heading-1 color-white">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                    <p class="text-desc-white">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
            </div>
            <div class="mt-60 images-link">
                @if ($shortcode->ios_link)
                    <a class="mr-20" href="{{ $shortcode->ios_link }}">
                        <img src="{{ $shortcode->ios_image ? RvMedia::getImageUrl($shortcode->ios_image) : Theme::asset()->url('apple-button.png') }}" alt="ios-image">
                    </a>
                @endif
                @if ($shortcode->android_link)
                    <a href="{{ $shortcode->android_link }}">
                        <img src="{{ $shortcode->android_image ? RvMedia::getImageUrl($shortcode->android_image) : Theme::asset()->url('google-play.png') }}" alt="android-image">
                    </a>
                @endif
            </div>
            <div class="mt-10 images-link">
                @foreach (array_filter(explode(';', $shortcode->featured)) as $item)
                    <span class="cb-layout @if ($loop->first) mr-5 @endif">{{ $item }}</span>
                @endforeach
            </div>
            <div class="block-1 d-none d-lg-block">
                @if ($shortcode->image_1)
                    <img src="{{ RvMedia::getImageUrl($shortcode->image_1) }}" alt="{{ $shortcode->image_1 }}">
                @endif
            </div>
            <div class="block-2 d-none d-lg-block">
                @if ($shortcode->image_2)
                    <img src="{{ RvMedia::getImageUrl($shortcode->image_2) }}" alt="{{ $shortcode->image_2 }}">
                @endif
            </div>
        </div>
    </div>
</section>
