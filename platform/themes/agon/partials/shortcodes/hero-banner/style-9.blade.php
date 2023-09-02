<div class="banner-hero bg-service-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    @if ($shortcode->title)
                        <h1 class="text-display-2">{!! BaseHelper::clean(str_replace($shortcode->highlight_text, '<span class="color-green-900">' . $shortcode->highlight_text . '</span>', $shortcode->title)) !!}</h1>
                    @endif
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40 text-center">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-black icon-arrow-right-white"
                                href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Get Started') }}</a>
                        @endif
                        @if ($shortcode->secondary_url)
                            <a class="btn btn-link icon-triangle color-gray-900 ml-40"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('How it works') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="banner-imgs">
                                @if ($shortcode->bg_image_1)
                                    <div class="block-1 shape-2">
                                        <img src="{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}" alt="{{ $shortcode->title }}">
                                    </div>
                                @endif
                                @if ($shortcode->bg_image_2)
                                    <div class="block-2 shape-2">
                                        <img src="{{ RvMedia::getImageUrl($shortcode->bg_image_2) }}" alt="{{ $shortcode->title }}">
                                    </div>
                                @endif
                                @if ($shortcode->image)
                                    <div class="block-3 shape-2">
                                        <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                                    </div>
                                @endif
                                @if ($shortcode->mini_image)
                                    <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

