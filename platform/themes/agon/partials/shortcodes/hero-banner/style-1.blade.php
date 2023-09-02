<div class="banner-hero banner-1">
    @if ($shortcode->bg_image_1)
        <div class="banner-1-bg-top" style="background: url('{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}') no-repeat; background-size: cover"></div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                @if ($shortcode->title)
                    <h1 class="text-display-2">{!! BaseHelper::clean(str_replace($shortcode->highlight_text, '<span class="color-green-900">' . $shortcode->highlight_text . '</span>', $shortcode->title)) !!}</h1>
                @endif
                @if ($shortcode->subtitle)
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                @endif
                <div class="mt-40">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black icon-arrow-right-white" href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Get Start') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-link icon-arrow-right color-gray-900 text-heading-6"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Learn More') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="banner-imgs">
                    @if ($shortcode->video_url)
                        <div class="video-block shape-1" @if ($shortcode->video_bg) style="background: url('{{ RvMedia::getImageUrl($shortcode->video_bg) }}') no-repeat; background-size: cover;" @endif>
                            <a aria-label="{{ __('Play video') }}" class="popup-youtube btn-play-video" href="{{ $shortcode->video_url }}"></a>
                        </div>
                    @endif
                    @if ($shortcode->image)
                        <img class="img-responsive shape-2" alt="{{ $shortcode->subtitle ?: $shortcode->image }}" src="{{ RvMedia::getImageUrl($shortcode->image) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if ($shortcode->bg_image_2)
        <div class="banner-1-bg-bottom" style="background: url('{{ RvMedia::getImageUrl($shortcode->bg_image_2) }}') no-repeat; background-size: cover"></div>
    @endif
</div>
