<div class="section-box">
    <div class="container mt-120">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 block-img-we-do text-center">
                @if ($shortcode->background)
                    <img class="img-small img-responsive" src="{{ RvMedia::getImageUrl($shortcode->background) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                @endif
                @if ($shortcode->image)
                    <div class="block-card">
                        <img src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                    </div>
                @endif
                @if ($shortcode->mini_image)
                    <div class="block-control">
                        <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                    </div>
                @endif
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 block-we-do">
                <h3 class="text-heading-1 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-400">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="row">
                    @foreach ($tabs as $tab)
                        <div class="col-lg-6 col-sm-6 col-12 mt-50">
                            <p class="text-heading-1 color-green-900 mb-10">{{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</p>
                            <h4 class="text-heading-6 d-flex">
                                @if ($icon = Arr::get($tab, 'icon'))
                                    <span class="d-flex justify-content-center">
                                        <i class="{{ $icon }} d-flex align-items-center me-1 color-green-900"></i>
                                    </span>
                                @endif
                                <span>{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</span>
                            </h4>
                            <p class="text-body-excerpt color-gray-600 mt-15">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
