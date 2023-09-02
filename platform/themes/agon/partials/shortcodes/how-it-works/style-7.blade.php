<section class="section-box mt-90 mb-mobile mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-sm-1 col-12"></div>
            <div class="col-lg-8 col-sm-10 col-12 text-center mt-40">
                <h2 class="text-heading-1 color-gray-900 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
            <div class="col-lg-2 col-sm-1 col-12"></div>
        </div>
    </div>
    <div class="container mt-90 mb-100">
        <div class="row">
            @foreach ($tabs as $tab)
                <div class="col-lg-6 col-sm-12">
                    <div class="bg-2 box-square hover-up">
                        <h3 class="text-heading-4 color-gray-900 mb-15">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                        <p class="text-body-text-md color-gray-600">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        <div class="box-image-inner bg-color-1">
                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
