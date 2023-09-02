<section class="section-box overflow-visible mb-100">
    <div class="container mt-60">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="bg-2 box-newsletter position-relative">
                    <div class="row">
                        <div class="col-lg-5 col-md-7">
                            <span class="text-body-capitalized color-gray-500 text-uppercase">{!! BaseHelper::clean($shortcode->name) !!}</span>
                            <h4 class="text-heading-2 mb-10 mt-10">{!! BaseHelper::clean($shortcode->title) !!}</h4>
                            <p class="text-body-text color-gray-500">{!! BaseHelper::clean(str_replace($shortcode->text_link, '<a href="' . $shortcode->link . '">' . $shortcode->text_link . '</a>', $shortcode->subtitle)) !!}</p>
                            <form class="form-newsletter subscribe-form newsletter-form" method="post" action="{{ route('public.newsletter.subscribe') }}">
                                @csrf
                                <div class="box-form-newsletter mt-30 d-flex align-items-center">
                                    <input type="email" name="email" required class="input-newsletter" placeholder="{{ __('Enter you mail') }}">
                                    <button class="btn btn-send" type="submit" aria-label="{{ __('Subscribe') }}"></button>
                                </div>
                                @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                    <div class="input-group justify-content-center justify-content-lg-end mt-3">
                                        {!! Captcha::display() !!}
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-7 col-md-5 mt-30 mt-lg-0 mt-md-30 mt-sm-30 position-relative text-end">
                            @if ($shortcode->mini_image)
                                <div class="block-chart shape-1">
                                    <img src="{{ RvMedia::getImageUrl($shortcode->mini_image) }}" alt="{{ $shortcode->title }}">
                                </div>
                            @endif
                            @if ($shortcode->image)
                                <img class="img-responsive img-newsletter" src="{{ RvMedia::getImageUrl($shortcode->image) }}" alt="{{ $shortcode->title }}">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
