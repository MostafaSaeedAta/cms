<div class="banner-hero banner-2"
    @if ($shortcode->bg_image_1)
        style="background: url('{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}');
            background-color: transparent;
            background-size: 100% 100%;
            padding-top: 100px;"
    @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                @if ($shortcode->highlight_text)
                    <span class="tag-1 color-orange-900">{!! BaseHelper::clean($shortcode->highlight_text) !!}</span>
                @endif
                <h1 class="text-display-3 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="mt-40">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black shape-square icon-arrow-right-white"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Join Our Team') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-link color-gray-900 icon-arrow-right text-heading-6"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Contact Us') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="banner-imgs">
                    @if ($shortcode->mini_image)
                        <div class="block-1 shape-1">
                            <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title ?: $shortcode->mini_image }}">
                        </div>
                    @endif
                    @if ($shortcode->image)
                        <img class="img-responsive shape-2" alt="{{ $shortcode->title ?: $shortcode->image }}" src="{{ RvMedia::getImageUrl($shortcode->image) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
