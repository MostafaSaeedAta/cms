<div class="header-top header-top-green">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 d-none d-md-block">
                @if (theme_option('hotline'))
                    <a class="text-body-text line-right"
                       href="tel:{{ theme_option('hotline') }}" dir="ltr">{{ theme_option('hotline') }}</a>
                @endif
                @if (theme_option('email'))
                    <a class="text-body-text" href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 text-end d-flex justify-content-end align-items-center">
                @if (is_plugin_active('language'))
                    <div class="language-switcher-container">
                        {!! apply_filters('language_switcher') !!}
                    </div>
                @endif
                @if (is_plugin_active('ecommerce'))
                    @if (count($currencies) > 1)
                        <div class="ms-2 dropdown dropdown-currencies">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdown-currencies" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ get_application_currency()->title }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-currencies">
                                @foreach ($currencies as $currency)
                                    @if ($currency->id !== get_application_currency_id())
                                        <li>
                                            <a class="dropdown-item" href="{{ route('public.change-currency', $currency->title) }}">{{ $currency->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="user-profile">
                        @if (auth('customer')->check())
                            <img src="{{ auth('customer')->user()->avatar_url }}" class="rounded-circle" title="{{ auth('customer')->user()->name }}" width="16" alt="{{ auth('customer')->user()->name }}">
                            <a href="{{ route('customer.overview') }}">{{ auth('customer')->user()->name }}</a>&nbsp;<span class="d-inline-block ms-1"></span>
                        @else
                            <a href="{{ route('customer.login') }}" class="text-white ms-2 ms-md-3 d-inline-block">
                                <i class="fi fi-rr-sign-in-alt d-inline-flex align-middle"></i>&nbsp;<span>{{ __('Login') }}</span>
                            </a>
                        @endif

                        <a href="{{ route('public.cart') }}" class="text-white ms-2 ms-md-3 header-cart-button d-inline-block">
                            <i class="fi fi-rr-shopping-cart d-inline-flex align-middle"></i>&nbsp;<span>{{ __('Cart') }}</span>&nbsp;(<span class="cart-count">{{ Cart::instance('cart')->count() }}</span>)</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
