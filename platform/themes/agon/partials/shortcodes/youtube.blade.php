@if (!empty($url))
    @if ($shortcode->with_container != 'no')
        <section class="section-box mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-1 col-12"></div>
                    <div class="col-lg-10 col-sm-10 col-12 text-center">
                        @if ($shortcode->title)
                            <div class="text-center mb-20">
                                <span class="tag-1">{!! BaseHelper::clean($shortcode->title) !!}</span>
                            </div>
                        @endif
                        @if ($shortcode->subtitle)
                            <h2 class="text-display-3 color-gray-900 mb-60">{!! BaseHelper::clean($shortcode->subtitle) !!}</h2>
                        @endif
                    </div>
                    <div class="col-lg-1 col-sm-1 col-12"></div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        {!! Theme::partial('shortcodes.partials.video', ['shortcode' => $shortcode, 'url' => $url]) !!}
                    </div>
                </div>
            </div>
        </section>
    @else
        {!! Theme::partial('shortcodes.partials.video', ['shortcode' => $shortcode, 'url' => $url]) !!}
    @endif
@endif
