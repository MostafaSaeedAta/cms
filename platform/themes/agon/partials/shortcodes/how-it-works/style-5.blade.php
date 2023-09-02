<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="text-start mb-25">
                    <span class="tag-1 bg-6 color-green-900">{!! BaseHelper::clean($shortcode->title) !!}</span>
                </div>
                <h2 class="text-heading-2 color-gray-900 mb-50">{!! BaseHelper::clean($shortcode->subtitle) !!}</h2>
            </div>
        </div>
    </div>
    <div class="container mt-20">
        <div class="row">
            @foreach ($tabs as $tab)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="list-icons">
                        <div class="item-icon none-bd">
                            <span class="icon-left">
                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                            </span>
                            <h3 class="text-heading-6">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                            <p class="text-body-text color-gray-600 mt-15">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
