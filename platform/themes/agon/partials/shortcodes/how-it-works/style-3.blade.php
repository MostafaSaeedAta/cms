<section class="section-box mt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 mt-50">
                <h2 class="text-heading-1 color-gray-900 mb-30">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-excerpt color-gray-600">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            @foreach ($tabs as $tab)
                <div class="col-lg-3 col-md-12 col-sm-12 mt-50">
                    <div class="list-icons">
                        <div class="item-icon pl-0">
                            <div class="mb-15">
                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                            </div>
                            <h3 class="text-heading-4">{{ $loop->iteration }}. {!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                            <p class="text-body-text color-gray-600 mt-15">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
