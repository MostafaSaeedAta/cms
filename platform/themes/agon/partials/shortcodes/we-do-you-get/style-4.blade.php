<div class="section-box">
    <div class="container mt-120">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-sm-12 mb-30">
                @if ($shortcode->image)
                    <img class="bdrd-16 img-responsive" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                @endif
            </div>
            <div class="col-xl-7 col-lg-6 col-sm-12 block-we-do">
                @if ($shortcode->highlight)
                    <span class="tag-1 bg-6 color-green-900">{!! BaseHelper::clean($shortcode->highlight) !!}</span>
                @endif
                <h3 class="text-heading-1 mt-20">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-600 mt-30">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="row mt-20">
                    @foreach ($tabs as $tab)
                        <div class="col-lg-6 col-sm-6 col-12 mt-20">
                            <h4 class="text-heading-6 d-flex">
                                <i class="{{ Arr::get($tab, 'icon') }} color-green-900 d-flex align-items-center me-1"></i>
                                <span>{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</span>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
