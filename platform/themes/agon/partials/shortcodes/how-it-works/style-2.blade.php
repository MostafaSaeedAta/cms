<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-12"></div>
            <div class="col-lg-10 col-sm-10 col-12 text-center">
                <h2 class="text-heading-1 color-gray-900 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-1 col-sm-1 col-12"></div>
        </div>
    </div>
    <div class="container mt-40">
        <div class="row">
            @foreach ($tabs as $tab)
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="list-icons mt-50">
                        <div class="item-icon">
                            <span class="icon-left">
                                <img class="w-100 h-auto" src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                            </span>
                            <h3 class="text-heading-4">{{ $loop->iteration }}. {!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                            <p class="text-body-text color-gray-600 mt-15">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
