@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20) ?: 4;
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if ($title = $shortcode->{'title_' . $i}) {
                $tabs[] = [
                    'title'    => $title,
                    'subtitle' => $shortcode->{'subtitle_' . $i},
                    'count'    => $shortcode->{'count_' . $i},
                    'extra'    => $shortcode->{'extra_' . $i}
                ];
            }
        }
    }
@endphp
@if (count($tabs))
    @switch($shortcode->style)
        @case('style-3')
        @case('style-2')
            {!! Theme::partial('shortcodes.statistical.' . $shortcode->style, compact('shortcode', 'tabs')) !!}
            @break
        @default
            {!! Theme::partial('shortcodes.statistical.style-1', compact('shortcode', 'tabs')) !!}
    @endswitch
@endif
