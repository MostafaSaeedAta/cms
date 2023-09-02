<div class="section-box">
    <div class="container mt-60">
        <div class="row">
            <div class="col-lg-6 col-sm-12 block-img-we-do img-bottom">
                @if ($shortcode->image)
                    <div class="inner-image">
                        <img class="img-responsive" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title ?: $shortcode->image }}">
                    </div>
                @endif
            </div>
            <div class="col-lg-6 col-sm-12 block-we-do-2">
                <h3 class="text-heading-1 mt-30">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                <div class="list-icons-round mt-40">
                    @foreach ($tabs as $tab)
                        <div class="item-icon none-bd wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->index * 2 + 1 }}s">
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
                            <h4 class="text-heading-5 color-green-900">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h4>
                            <p class="text-body-text color-gray-600 mt-5">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
