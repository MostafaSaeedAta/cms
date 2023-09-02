<div class="banner-hero banner-homepage8">
        <div class="container mt-50">
            <div class="row">
                <div class="col-lg-7">
                    @if ($shortcode->highlight_text)
                        <span class="tag-1 bg-6 color-green-900">{!! BaseHelper::clean($shortcode->highlight_text) !!}</span>
                    @endif
                    <h1 class="text-display-4 font-bold mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40 box-mw-610">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-newsletter icon-arrow-right-white position-relative"
                                href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Search') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="banner-imgs d-flex">
                        @if ($shortcode->bg_image_1)
                            <div class="rounded-img shape-1">
                                <img class="img-responsive" src="{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->bg_image_2)
                            <div class="rounded-img mt-20 shape-1-2">
                                <img class="img-responsive" src="{{ RvMedia::getImageUrl($shortcode->bg_image_2) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->image)
                            <div class="rounded-img shape-1">
                                <img class="img-responsive" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->mini_image)
                            <div class="rounded-img mt-20 shape-1-2">
                                <img class="img-responsive" src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

