@php
    SeoHelper::setTitle( __('Order successfully. Order number :id', ['id' => $order->code]) );
    Theme::fireEventGlobalAssets();
    AdminBar::setIsDisplay(false);
@endphp

{!! Theme::partial('header') !!}

{!! Html::style('vendor/core/core/base/libraries/font-awesome/css/fontawesome.min.css') !!}
{!! Html::style('vendor/core/plugins/ecommerce/css/front-theme.css?v=1.2.1') !!}

@if (BaseHelper::siteLanguageDirection() == 'rtl')
    {!! Html::style('vendor/core/plugins/ecommerce/css/front-theme-rtl.css?v=1.2.1') !!}
@endif

{!! Html::style('vendor/core/core/base/libraries/toastr/toastr.min.css') !!}

{{-- {!! Html::script('vendor/core/plugins/ecommerce/js/checkout.js?v=1.2.1') !!} --}}

{{-- @if (EcommerceHelper::loadCountriesStatesCitiesFromPluginLocation())
    <script src="{{ asset('vendor/core/plugins/location/js/location.js') }}?v=1.2.1"></script>
@endif --}}


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12 left">
                {{-- @include('plugins/ecommerce::orders.partials.logo') --}}

                <div class="thank-you">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <div class="d-inline-block">
                        <h3 class="thank-you-sentence">
                            {{ __('Your order is successfully placed') }}
                        </h3>
                        <p>{{ __('Thank you for purchasing our products!') }}</p>
                    </div>
                </div>

                @include('plugins/ecommerce::orders.thank-you.customer-info', compact('order'))

                <a href="{{ route('public.index') }}" class="btn payment-checkout-btn"> {{ __('Continue shopping') }} </a>
            </div>
            <div class="col-lg-5 col-md-6 d-none d-md-block right">

                @include('plugins/ecommerce::orders.thank-you.order-info')

                <hr>

                @include('plugins/ecommerce::orders.thank-you.total-info', ['order' => $order])
            </div>
        </div>
    </div>

{!! Theme::partial('footer') !!}
