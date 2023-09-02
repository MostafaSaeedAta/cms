@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if ($title = $shortcode->{'title_' . $i}) {
                $tabs[] = [
                    'title'        => $title,
                    'subtitle'     => $shortcode->{'subtitle_' . $i},
                    'link'         => $shortcode->{'link_' . $i},
                    'image'        => $shortcode->{'image_' . $i},
                    'bottom_image' => $shortcode->{'bottom_image_' . $i},
                    'bg_color'     => $shortcode->{'bg_color_' . $i},
                    'border_color' => $shortcode->{'border_color' . $i},
                ];
            }
        }
    }
@endphp
@if (count($tabs))
    @switch($shortcode->style)
        @case('style-2')
            {!! Theme::partial('shortcodes.we-facilitate.style-2', compact('shortcode', 'tabs')) !!}
            @break
        @default
            {!! Theme::partial('shortcodes.we-facilitate.style-1', compact('shortcode', 'tabs')) !!}
    @endswitch
@endif
