<section class="section-box">
    <div class="container mt-120">
        <div class="row">
            <div class="col-lg-6 col-sm-12 block-img-we-do">
                <div class="inner-image">
                    @if ($shortcode->image)
                        <img class="bdrd-16 img-responsive" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                    @endif
                    @if ($shortcode->mini_image)
                        <div class="block-chart">
                            <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 block-we-do-2">
                @if ($shortcode->highlight)
                    <span class="tag-1 bg-6 color-green-900">{!! BaseHelper::clean($shortcode->highlight) !!}</span>
                @endif
                <h3 class="text-heading-1 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-600 mt-30">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="list-icons mt-50">
                    @foreach ($tabs as $tab)
                        <div class="item-icon none-bd">
                            @if (Arr::get($tab, 'image'))
                                <span class="icon-left">
                                    <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                </span>
                            @else
                                <span class="icon-left d-flex justify-content-center">
                                    @if (Arr::get($tab, 'icon'))
                                        <span class="fs-3 bg-secondary p-3 bg-gradient rounded-circle d-inline-block">
                                            <i class="{{ Arr::get($tab, 'icon') }} d-flex"></i>
                                        </span>
                                    @endif
                                </span>
                            @endif
                            <h4 class="text-heading-4">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h4>
                            <p class="text-body-excerpt color-gray-600 mt-15">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
