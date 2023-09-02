@php
    SeoHelper::setTitle(__('404 - Not found'));
    Theme::fireEventGlobalAssets();
    AdminBar::setIsDisplay(false);
@endphp

{!! Theme::partial('header') !!}

<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mt-40">
                <img src="{{ theme_option('404_page_image') ? RvMedia::getImageUrl(theme_option('404_page_image')) : Theme::asset()->url('imgs/404.png') }}"
                    alt="404" class="img-responsive">
                <h2 class="text-heading-1 color-gray-900 mb-20 mt-50">{{ __('Whoops! That page doesn’t exist.') }}</h2>
                <p class="text-heading-5 color-gray-600 mt-30 mb-70">{{ __('The page you requested could not be found') }}</p>
                <div class="text-center mb-50">
                    <a class="btn btn-black icon-arrow-left" href="{{ route('public.index') }}">{{ __('Back to Homepage') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

{!! Theme::partial('footer') !!}
