<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    @foreach ($tabs as $tab)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 pr-mb-70 mb-30">
                            <h3 class="text-display-3">
                                <span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</h3>
                            <span class="text-body-quote">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</span>
                            <p class="text-body-text">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 pdl-md">
                <h3 class="text-heading-1">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                <div class="mt-40 box-mw-610">
                    @if ($shortcode->primary_url && $shortcode->primary_title)
                        <a class="btn btn-newsletter icon-arrow-right-white position-relative"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title }}</a>
                    @endif
                </div>
                <div class="mt-40">
                    <ul class="list-icon-3">
                        @foreach (array_filter(explode(';', $shortcode->featured)) as $item)
                            <li class="text-body-text-md">{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
