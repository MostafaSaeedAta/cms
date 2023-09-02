<div class="section-box box-slider-3 d-none d-lg-flex">
    <div class="container">
        <div class="block-slider-bottom-banner">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-1">
                    <div class="swiper-wrapper pt-5">
                        <div class="swiper-slide active">
                            <div class="row">
                                @foreach ($tabs as $tab)
                                    <div class="col-12 @if ($subtitle = Arr::get($tab, 'subtitle')) swiper-slide-2 @else swiper-slide-1 @endif">
                                        <div class="grid-category grid-category-style-2">
                                            <div class="grid-image-left-category">
                                                <span @if (!$subtitle) class="d-flex" @endif>
                                                    <div class="category-image">
                                                        @if ($icon = Arr::get($tab, 'icon'))
                                                            <span class="d-flex justify-content-center">
                                                                <i class="{{ $icon }} fs-5 d-flex align-items-center"></i>
                                                            </span>
                                                        @else
                                                            <span class="for-design"></span>
                                                        @endif
                                                    </div>
                                                    <div class="category-info">
                                                        <h3 class="text-heading-6 @if ($subtitle) mt-15 @endif">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                                                        @if ($subtitle)
                                                            <p class="text-body-lead-large color-gray-500 mt-10">{!! BaseHelper::clean($subtitle) !!}</p>
                                                            <span class="icon-arrow-right-thin"></span>
                                                        @endif
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="grid-image-bottom">
                                                @if (Arr::get($tab, 'image'))
                                                    <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-next-5"></div>
                <div class="swiper-button-prev swiper-button-prev-5"></div>
            </div>
        </div>
    </div>
</div>
