<section class="section-box mt-100">
    <div class="container">
        <div class="text-center mb-20">
            @if ($shortcode->highlight)
                <span class="tag-1 bg-6 color-green-900">{!! BaseHelper::clean($shortcode->highlight) !!}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-2 col-sm-1 col-12"></div>
            <div class="col-lg-8 col-sm-10 col-12 text-center">
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
                    <div class="card-grid-style-3 pb-40 mb-30" style="@if (Arr::get($tab, 'bg_color')) background-color: {{ Arr::get($tab, 'bg_color') }}; @endif
                        @if (Arr::get($tab, 'border_color')) border-color: {{ Arr::get($tab, 'border_color') }}; @endif" >
                        <div class="grid-1-img">
                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                        </div>
                        <h3 class="text-heading-3 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                        <p class="text-body-excerpt mt-20">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>

                        @if (Arr::get($tab, 'link'))
                            <div class="mt-30">
                                <a class="btn btn-default icon-arrow-right" href="{{ Arr::get($tab, 'link') }}">{{ __('Learn more') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
