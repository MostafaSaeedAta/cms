<div class="banner-hero bg-about-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 box-banner-left">
                    @if ($shortcode->highlight_text)
                        <span class="tag-1 bg-6 color-green-900">{{ $shortcode->highlight_text }}</span>
                    @endif
                    <h1 class="text-display-3 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-black shape-square icon-arrow-right-white"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->primary_title ?: __('Join Our Team') }}</a>
                        @endif
                        @if ($shortcode->secondary_url)
                            <a class="btn btn-link color-gray-900 icon-arrow-right text-heading-6"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Contact Us') }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="banner-imgs">
                        <div class="block-1 shape-2">
                            @if ($shortcode->image)
                                <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                            @endif
                        </div>
                        <div class="float-end col-lg-6 mt-90">
                            <div class="list-icons mt-50">
                                @foreach ($tabs as $tab)
                                    <div class="item-icon none-bd">
                                        <span class="icon-left">
                                            @if (Arr::get($tab, 'image'))
                                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                            @endif
                                        </span>
                                        <h4 class="text-heading-4">
                                            <span class="text-heading-3 color-green-900">@if (!in_array(Arr::get($tab, 'extra'), ['%', '+']))+@endif<span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</span>
                                        </h4>
                                        <p class="text-body-text color-gray-500">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

