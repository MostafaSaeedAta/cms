<section class="section-box">
    <div class="container mt-120">
        <div class="bg-2 bdrd-58 pattern-white pb-60">
            <div class="row">
                <div class="col-lg-2 col-sm-1 col-12"></div>
                <div class="col-lg-8 col-sm-10 col-12 text-center mt-70">
                    <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
                <div class="col-lg-2 col-sm-1 col-12"></div>
            </div>
            <div class="container mt-70">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-3">
                        <div class="swiper-wrapper pb-70 pt-5">
                            @foreach ($tabs as $tab)
                                <div class="swiper-slide">
                                    <div class="card-grid-style-2 hover-up">
                                        <div class="grid-2-img">
                                            <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                        </div>
                                        <h3 class="text-heading-5 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                                        <p class="text-body-text color-gray-600 mt-20">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination swiper-pagination3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
