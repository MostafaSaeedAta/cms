@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20);
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if (($title = $shortcode->{'title_' . $i})) {
                $tabs[] = [
                    'title'    => $title,
                    'subtitle' => $shortcode->{'subtitle_' . $i},
                    'icon'     => $shortcode->{'icon_' . $i},
                ];
            }
        }
    }
@endphp

@switch($shortcode->style)
    @case('style-2')
        {!! Theme::partial('shortcodes.faq.style-2', compact('shortcode', 'faqs', 'tabs')) !!}
        @break
    @default
        {!! Theme::partial('shortcodes.faq.style-1', compact('shortcode', 'faqs')) !!}
@endswitch
