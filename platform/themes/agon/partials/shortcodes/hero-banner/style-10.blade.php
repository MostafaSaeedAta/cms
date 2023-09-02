<div class="banner-hero banner-homepage5">
        <div class="container mt-50">
            <div class="row">
                <div class="col-lg-8">
                    @if ($shortcode->highlight_text)
                        <span class="text-heading-4 color-gray-400">{!! BaseHelper::clean($shortcode->highlight_text) !!}</span>
                    @endif
                    <h1 class="text-display-2 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40">
                        <ul class="list-icon-3">
                            @foreach ($tabs as $tab)
                                <li class="text-body-text-md">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @if ($shortcode->primary_url)
                        <div class="mt-40 box-mw-610">
                            <a class="btn btn-newsletter icon-arrow-right-white position-relative" href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title }}</a>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 mt-50 d-none d-lg-block">
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
                            <div class="block-3 shape-3">
                                <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->mini_image)
                            <img class="img-responsive shape-1" src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

