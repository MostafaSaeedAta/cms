{{-- <section class="section-box mt-40 mb-0">
    <div class="container position-relative">
        <div class="banner-promotion" @if ($config['image']) style="background: url({{ RvMedia::getImageUrl($config['image']) }}) no-repeat top center;" @endif>
            <div class="box-banner-promotion">
                <h3 class="text-head-ads mb-15">{!! BaseHelper::clean(Arr::get($config, 'title')) !!}</h3>
                <p class="desc-ads">{!! BaseHelper::clean(nl2br(Arr::get($config, 'subtitle'))) !!}</p>
            </div>
        </div>
        @if ($config['link'])
            <a href="{{ $config['link'] }}" class="stretched-link"></a>
        @endif
    </div>
</section> --}}

<div class="banner-widget mb-4">
    <div class="image-contain">
        <h6 class="widget-banner-text">
              <span>{!! BaseHelper::clean(Arr::get($config, 'title')) !!}</span>
        </h6>
        <img src="{{ RvMedia::getImageUrl($config['image']) }}" alt="banner" >
    </div>
</div>
