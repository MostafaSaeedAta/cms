@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if ($title = $shortcode->{'title_' . $i}) {
                $tabs[] = [
                    'title'    => $title,
                    'subtitle' => $shortcode->{'subtitle_' . $i},
                    'icon'     => $shortcode->{'icon_' . $i},
                    'image'    => $shortcode->{'image_' . $i},
                ];
            }
        }
    }
@endphp

@switch($shortcode->style)
    @case('style-8')
    @case('style-7')
    @case('style-6')
    @case('style-5')
    @case('style-4')
    @case('style-3')
    @case('style-2')
        {!! Theme::partial('shortcodes.we-do-you-get.' . $shortcode->style, compact('shortcode', 'tabs')) !!}
        @break
    @default
        {!! Theme::partial('shortcodes.we-do-you-get.style-1', compact('shortcode', 'tabs')) !!}
@endswitch
