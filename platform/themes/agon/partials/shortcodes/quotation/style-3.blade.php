@php
    $active = Arr::first($tabs, function ($value) {return $value['active'] == true; });
@endphp
<div class="section-box mt-90"></div>
<section class="container">
    <h3 class="text-heading-1 text-center mt-50 mb-50">{!! BaseHelper::clean($shortcode->title) !!}</h3>
    <div class="container mt-70">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="block-pricing-3 mb-90">
                    <div class="row">
                        <div class="col-lg-12 col-xl-6 col-sm-12">
                            <div class="block-pricing-left">
                                <div class="box-switch">
                                    <label>
                                        <input type="checkbox" name="billed_type">
                                        <span class="text-billed text-billed-month active">{{ __('Monthly') }}</span>
                                        <span class="text-billed text-billed-year">{{ __('Yearly') }}</span>
                                    </label>
                                </div>
                                <ul class="list-package-feature">
                                    @foreach (Arr::get($active, 'checked', []) as $item)
                                        <li class="active">{{ $item }}</li>
                                    @endforeach
                                    @foreach (Arr::get($active, 'uncheck', []) as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-sm-12">
                            @foreach ($tabs as $tab)
                                <div class="block-price-item @if (Arr::get($tab, 'active')) active @endif">
                                    <span class="checkbox"></span>
                                    <div class="block-pricing-info">
                                        <h3 class="text-heading-5 color-gray-900 mb-15">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                                        <span class="tag-round text-body-text">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</span>
                                    </div>
                                    <div class="d-none">
                                        <ul class="block-package-feature">
                                            @foreach (Arr::get($tab, 'checked', []) as $item)
                                                <li class="active">{{ $item }}</li>
                                            @endforeach
                                            @foreach (Arr::get($tab, 'uncheck', []) as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="box-info-price">
                                        <span class="text-heading-3 for-month display-month">{{ Arr::get($tab, 'month_price') }}</span>
                                        <span class="text-heading-3 for-year">{{ Arr::get($tab, 'year_price') }}</span>
                                        <span class="text-month for-month text-body-text color-gray-500 display-month">/{{ __('month') }}</span>
                                        <span class="text-month for-year text-body-text color-gray-500">/{{ __('year') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="text-center mt-30 mb-100">
                    @if ($shortcode->primary_url)
                        <a class="btn btn-black icon-arrow-right-white mb-20 mr-20"
                            href="{{ $shortcode->primary_url }}">{{ $shortcode->primary_title ?: __('Start free trial') }}</a>
                    @endif
                    @if ($shortcode->secondary_url)
                        <a class="btn btn-default icon-arrow-right mb-20"
                            href="{{ $shortcode->secondary_url }}">{{ $shortcode->secondary_title ?: __('View plans comparison') }}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>
