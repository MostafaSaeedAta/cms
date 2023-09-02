<div class="banner-hero banner-homepage6">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-50 pb-120">
                    @if ($shortcode->highlight_text)
                        <span class="tag-1 bg-green-900">{!! BaseHelper::clean($shortcode->highlight_text) !!}</span>
                    @endif
                    <h1 class="text-display-2 mt-20">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-gray-500 mt-30 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-black shape-square icon-arrow-right-white"
                                href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Get Start') }}</a>
                        @endif
                        @if ($shortcode->secondary_url)
                            <a class="btn btn-link icon-triangle color-gray-900 ml-40"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('How it works') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="banner-imgs">
                        @if ($shortcode->bg_image_1)
                            <div class="block-1 shape-2">
                                <img src="{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->bg_image_2)
                            <div class="block-2 shape-3">
                                <img src="{{ RvMedia::getImageUrl($shortcode->bg_image_2) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->image)
                            <img class="img-banner img-responsive shape-2" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

