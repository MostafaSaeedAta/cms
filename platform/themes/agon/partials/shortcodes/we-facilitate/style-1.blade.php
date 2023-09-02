<section class="section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-1 col-12"></div>
            <div class="col-lg-8 col-sm-10 col-12 text-center mt-100">
                <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-2 col-sm-1 col-12"></div>
        </div>
    </div>
    <div class="container mt-70">
        <div class="row">
            @foreach ($tabs as $tab)
                <div class="col-lg-4 col-sm-12">
                    <div class="card-grid-1 hover-up" @if (Arr::get($tab, 'bg_color')) style="background-color: {{ Arr::get($tab, 'bg_color') }};" @endif>
                        @if (Arr::get($tab, 'bottom_image'))
                            <div class="bg--before" style="background-image: url({{ RvMedia::getImageUrl(Arr::get($tab, 'bottom_image')) }})"></div>
                        @endif
                        <div class="grid-1-img">
                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                        </div>
                        <h3 class="text-heading-3 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                        <p class="text-body-excerpt mt-20">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        @if (Arr::get($tab, 'link'))
                            <div class="mt-30">
                                <a class="btn btn-default btn-white icon-arrow-right" href="{{ Arr::get($tab, 'link') }}">{{ __('Learn more') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
