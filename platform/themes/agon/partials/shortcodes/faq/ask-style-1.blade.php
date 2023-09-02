<section class="section-box">
    <div class="banner-hero banner-faqs-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="text-display-3 color-white mb-30">{!! BaseHelper::clean($shortcode->title) !!}</h1>
                    <div class="form-round">
                        <form class="form-inline faq-filter-form" action="#">
                            <input class="form-control input-round" name="q" placeholder="{{ __('Ask a questions...') }}">
                            <button class="btn btn-round-icon" type="submit"></button>
                        </form>
                    </div>
                    <p class="text-body-lead color-white mt-40">
                        {!! BaseHelper::clean($shortcode->subtitle) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
