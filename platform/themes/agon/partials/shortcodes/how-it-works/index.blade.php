@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if (($title = $shortcode->{'title_' . $i})) {
                $tabs[] = [
                    'title'    => $title,
                    'subtitle' => $shortcode->{'subtitle_' . $i},
                    'image'    => $shortcode->{'image_' . $i},
                    'bg_color' => $shortcode->{'bg_color_' . $i},
                ];
            }
        }
    }
@endphp
@if (count($tabs))
    @switch($shortcode->style)
        @case('style-2')
        @case('style-3')
        @case('style-4')
        @case('style-5')
        @case('style-6')
        @case('style-7')
            {!! Theme::partial('shortcodes.how-it-works.' . $shortcode->style, compact('shortcode', 'tabs')) !!}
            @break
        @default
            {!! Theme::partial('shortcodes.how-it-works.style-1', compact('shortcode', 'tabs')) !!}
    @endswitch
@endif
