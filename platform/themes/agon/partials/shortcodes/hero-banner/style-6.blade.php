<div class="banner-hero banner-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="text-display-2 color-white">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <p class="text-body-lead-large color-white mt-30 pr-40">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                    <div class="mt-40">
                        @if ($shortcode->primary_url)
                            <a class="btn btn-pink icon-arrow-right-white text-heading-6"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->primary_title ?: __('Get Start') }}</a>
                        @endif
                        @if ($shortcode->secondary_url)
                            <a class="btn btn-link color-white text-heading-6 btn-link-inter"
                                href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('Learn More') }}</a>
                        @endif
                    </div>
                    <div class="mt-60">
                        <div class="row">
                            @foreach ($tabs as $tab)
                                <div class="col-lg-3 col-sm-4 col-4">
                                    <h3 class="text-heading-2 color-white mb-15">@if (!in_array(Arr::get($tab, 'extra'), ['%', '+']))+@endif<span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</h3>
                                    <p class="text-body-normal color-gray-300">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="banner-imgs">
                        @if ($shortcode->video_url)
                            <a aria-label="{{ __('Play video') }}" class="popup-youtube btn-play-video-2" href="{{ $shortcode->video_url }}"></a>
                        @endif
                        @if ($shortcode->image)
                            <img class="img-responsive shape-2"
                                alt="{{ $shortcode->title }}" src="{{ RvMedia::getImageUrl($shortcode->image) }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

