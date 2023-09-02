@php
    $style = 'style-1';
    if (in_array($shortcode->style, ['style-2'])) {
        $style = $shortcode->style;
    }

    $container = 'col-xl-12 col-lg-12';
    $col = 'col-xl-3 col-lg-6 col-md-6';
    switch (count($tabs)) {
        case 1:
            $container = 'col-xl-4 col-lg-6';
            $col = 'col-12';
            break;
        case 2:
            $container = 'col-xl-6 col-lg-8';
            $col = 'col-lg-6 col-md-6';
            break;
        case 3:
            $container = 'col-xl-10 col-lg-12';
            $col = 'col-lg-4 col-md-6';
            break;
    }
@endphp
<section class="section-box mt-100 @if ($style == 'style-1') section-green @endif">
    <div class="container mt-70">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <h3 class="text-heading-1 text-center mb-10 @if ($style == 'style-1') color-white @endif">{!! BaseHelper::clean($shortcode->title) !!}</h3>
            </div>
        </div>
    </div>
    <div class="container mt-70">
        <div class="text-center mt-10 @if ($style == 'style-2') block-bill-2 @endif">
            <span class="text-lg text-billed">{{ __('Billed Monthly') }}</span>
            <label class="switch ml-20 mr-20">
                <input type="checkbox" name="billed_type" aria-label="{{ __('Toggle bill type') }}">
                <span class="slider round"></span>
            </label>
            <span class="text-lg text-billed">{{ __('Bill Annually') }}</span>
        </div>
        <div class="block-pricing mt-70 @if ($style == 'style-2') block-pricing-2 @endif">
            <div class="row justify-content-center">
                <div class="{{ $container }}">
                    <div class="row">
                        @foreach ($tabs as $tab)
                            <div class="{{ $col }} wow animate__animated animate__fadeIn" data-wow-delay=".{{ $loop->iteration }}s">
                                <div class="box-pricing-item @if ($style == 'style-2') hover-up @endif @if (Arr::get($tab, 'active')) active @endif">
                                    <div class="box-info-price">
                                        <span class="text-heading-3 for-month display-month">{{ Arr::get($tab, 'month_price') }}</span>
                                        <span class="text-heading-3 for-year">{{ Arr::get($tab, 'year_price') }}</span>
                                        <span class="text-month for-month text-body-small color-gray-400 display-month">/{{ __('month') }}</span>
                                        <span class="text-month for-year text-body-small color-gray-400">/{{ __('year') }}</span>
                                    </div>
                                    <div class="line-bd-bottom">
                                        <h4 class="text-heading-5 mb-15">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h4>
                                        <p class="text-body-small color-gray-400">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                                    </div>
                                    <ul class="list-package-feature">
                                        @foreach (Arr::get($tab, 'checked', []) as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                        @foreach (Arr::get($tab, 'uncheck', []) as $item)
                                            <li class="uncheck">{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                    @if (Arr::get($tab, 'link'))
                                        <div>
                                            <a class="btn btn-black-border text-body-lead icon-arrow-right" href="{{ Arr::get($tab, 'link') }}">{{ Arr::get($tab, 'title_link') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
