<div class="banner-hero banner-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1 class="text-heading-4 color-gray-900 mb-20">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                <p class="text-body-text color-gray-400">
                    {!! BaseHelper::clean($shortcode->subtitle) !!}
                </p>
            </div>
            <div class="col-lg-7">
                <div class="form-square">
                    <form class="form-inline faq-filter-form" action="#">
                        <input class="form-control input-with-button" name="q" placeholder="{{ __('Your question...') }}">
                        <button class="text-heading-6 btn btn-square-green text-nowrap" type="submit">{{ __('Find now') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
