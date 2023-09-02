<div class="banner-hero bg-service-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 box-banner-left">
                <h1 class="text-display-3 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                <p class="text-body-lead-large color-gray-600 mt-40 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="mt-40">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black shape-square icon-arrow-right-white"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Get Started') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-link icon-triangle color-gray-900 ml-40"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('How it works') }}</a>
                    @endif
                </div>
                <div class="row mt-50">
                    @foreach ($tabs as $tab)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="list-icons">
                                <div class="item-icon none-bd">
                                    <span class="icon-left">
                                        @if (Arr::get($tab, 'image'))
                                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                        @endif
                                    </span>
                                    <h4 class="text-heading-4">
                                        <span class="text-heading-3 color-green-900">+<span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</span>
                                    </h4>
                                    <p class="text-body-text color-gray-500">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="banner-imgs">
                    @if ($shortcode->mini_image)
                        <div class="block-1 shape-2">
                            <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title ?: $shortcode->mini_image }}">
                        </div>
                    @endif
                    @if ($shortcode->image)
                        <img  src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

