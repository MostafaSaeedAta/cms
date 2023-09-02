@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if (($image = $shortcode->{'image_' . $i}) && ($title = $shortcode->{'title_' . $i})) {
                $tabs[] = [
                    'title' => $title,
                    'image' => $image,
                    'link'  => $shortcode->{'link_' . $i} ?: '#'
                ];
            }
        }
    }
@endphp

@if (count($tabs))
    <div class="section-box overflow-visible mt-70">
        <div class="container">
            @if ($shortcode->subtitle)
                <h2 class="text-heading-3 text-center color-gray-900 mb-60">{!! BaseHelper::clean($shortcode->subtitle) !!}</h2>
            @endif
            <div class="row justify-content-md-center">
                @foreach ($tabs as $tab)
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center">
                        <a class="item-logo box-hover-shadow hover-up" href="{{ Arr::get($tab, 'link') }}">
                            <img alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}" src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image')) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
