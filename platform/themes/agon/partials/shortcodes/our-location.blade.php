@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            $tabs[] = [
                'title'   => $shortcode->{'title_' . $i},
                'image'   => $shortcode->{'image_' . $i},
                'address' => $shortcode->{'address_' . $i},
                'phone'   => $shortcode->{'phone_' . $i},
                'email'   => $shortcode->{'email_' . $i},
            ];
        }
    }
@endphp

<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-10 col-12 text-center mt-40">
                <h2 class="text-heading-1 color-gray-900 mb-20">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                <p class="text-body-lead-large color-gray-600 mt-20">{!! BaseHelper::clean($shortcode->subtitle) !!}</p>
            </div>
        </div>
    </div>
    <div class="container mt-60">
        <div class="row">
            @foreach ($tabs as $tab)
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="list-icons hover-up">
                        <div class="item-icon">
                            @if (Arr::get($tab, 'image'))
                                <span class="icon-left">
                                    <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                </span>
                            @endif
                            <h4 class="text-heading-4">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h4>
                            <p class="text-body-text color-gray-1100 mt-15">{{ Arr::get($tab, 'address') }}
                                    @if (Arr::get($tab, 'phone'))<br>{{ __('Phone')}}: {{ Arr::get($tab, 'phone') }} @endif
                                    @if (Arr::get($tab, 'email'))<br>{{ __('Email') }}: {{ Arr::get($tab, 'email') }} @endif</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
