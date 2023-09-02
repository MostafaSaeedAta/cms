@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if (($name = $shortcode->{'name_' . $i})) {
                $tabs[] = [
                    'name'        => $name,
                    'position'    => $shortcode->{'position_' . $i},
                    'image'       => $shortcode->{'image_' . $i},
                    'description' => $shortcode->{'description_' . $i},
                    'facebook'    => $shortcode->{'facebook_' . $i},
                    'twitter'     => $shortcode->{'twitter_' . $i},
                    'instagram'   => $shortcode->{'instagram_' . $i},
                    'linkedin'    => $shortcode->{'linkedin_' . $i},
                ];
            }
        }
    }

    $chunked = collect($tabs)->chunk(8);
@endphp
@if ($chunked->count())
    <section class="section-box">
        <div class="container mt-110">
            <div class="row">
                <div class="col-lg-9 col-sm-8">
                    <h3 class="text-heading-1 mb-10">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                    <p class="text-body-lead-large color-gray-600">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
                </div>
            </div>
        </div>
        <div class="container mt-80">
            <div class="our-team owl-carousel owl-theme">
                        @foreach ($chunked as $tabs)
                                    @foreach ($tabs as $tab)
                                    <div class="item">
                                        <div class="card-grid-style-5 hover-up">
                                            <div class="grid-5-img mb-15">
                                                <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ Arr::get($tab, 'name') }}">
                                            </div>
                                            <span class="text-body-text-md color-gray-500">{{ Arr::get($tab, 'position') }}</span>
                                            <h3 class="text-heading-5 mb-5 mt-5">{{ Arr::get($tab, 'name') }}</h3>
                                            <p class="text-body-excerpt text-desc color-gray-500 mt-15 mb-20">{{ Arr::get($tab, 'description') }}</p>
                                            @if (array_filter(array_values(Arr::only($tab, ['facebook', 'twitter', 'instagram', 'linkedin']))))
                                                <span class="text-body-text-md color-gray-600">{{ __('Let’s Connect') }}</span>
                                                <div class="social-bottom">
                                                    @if (Arr::get($tab, 'facebook'))
                                                        <a class="icon-socials icon-facebook" href="{{ Arr::get($tab, 'facebook') }}"></a>
                                                    @endif
                                                    @if (Arr::get($tab, 'twitter'))
                                                        <a class="icon-socials icon-twitter" href="{{ Arr::get($tab, 'twitter') }}"></a>
                                                    @endif
                                                    @if (Arr::get($tab, 'instagram'))
                                                        <a class="icon-socials icon-instagram" href="{{ Arr::get($tab, 'instagram') }}"></a>
                                                    @endif
                                                    @if (Arr::get($tab, 'linkedin'))
                                                        <a class="icon-socials icon-linkedin" href="{{ Arr::get($tab, 'linkedin') }}"></a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                        @endforeach
            </div>
        </div>
    </section>
@endif
