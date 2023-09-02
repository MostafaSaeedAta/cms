<section class="section-box mt-100">
    <div class="container">
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
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="card-grid-style-6 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration * 2 - 1 }}s">
                        <div class="grid-6-img">
                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                        </div>
                        <h3 class="text-heading-5 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                        <p class="text-body-text color-gray-600 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
