<div class="banner-hero banner-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-50">
                    @if ($shortcode->highlight_text)
                        <span class="tag-1 bg-green-900">{{ $shortcode->highlight_text }}</span>
                    @endif
                    <h1 class="text-display-3 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-black shape-square icon-arrow-right-white"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->primary_title ?: __('Get Start') }}</a>
                        @endif
                        @if ($shortcode->secondary_url)
                            <a class="btn btn-link icon-triangle color-gray-900 ml-40"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('How it works') }}</a>
                        @endif
                    </div>
                    <div class="mt-50">
                        <div class="row">
                            @foreach ($tabs as $tab)
                                <div class="col-lg-3 col-sm-4 col-4">
                                    <h3 class="text-heading-4 color-gray-900 mb-15">@if (!in_array(Arr::get($tab, 'extra'), ['%', '+']))+@endif<span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</h3>
                                    <p class="text-body-text-md color-gray-500">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="banner-imgs">
                        @if ($shortcode->image)
                            <div class="block-1 shape-2">
                                <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->mini_image)
                            <div class="block-2 shape-3">
                                <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                            </div>
                        @endif
                        @if ($shortcode->bg_image_1)
                            <img class="img-responsive shape-1" alt="{{ $shortcode->title }}" src="{{ RvMedia::getImageUrl($shortcode->bg_image_1) }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>

