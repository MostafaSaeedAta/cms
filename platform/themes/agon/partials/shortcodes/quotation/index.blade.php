@php
    $tabs = [];
    $quantity = min((int) $shortcode->quantity, 20) ?: 6;
    $isActive = false;
    if ($quantity) {
        for ($i = 1; $i <= $quantity; $i++) {
            if ($title = $shortcode->{'title_' . $i}) {
                $isActive = !$isActive ? $shortcode->{'active_' . $i} == 'yes' : false;
                $tabs[] = [
                    'title'       => $title,
                    'subtitle'    => $shortcode->{'subtitle_' . $i},
                    'month_price' => $shortcode->{'month_price_' . $i},
                    'year_price'  => $shortcode->{'year_price_' . $i},
                    'link'        => $shortcode->{'link_' . $i},
                    'title_link'  => $shortcode->{'title_link_' . $i} ?: __('Get Started'),
                    'checked'     => array_filter(explode(';', $shortcode->{'checked_' . $i})),
                    'uncheck'     => array_filter(explode(';', $shortcode->{'uncheck_' . $i})),
                    'active'      => $isActive,
                ];
            }
        }
    }

    if ($tabs) {
        $active = Arr::first($tabs, function ($value) {
            return $value['active'] == true;
        });
        if (!$active) {
            $tabs[0]['active'] = true;
        }
    }
@endphp

@if (count($tabs))
    @switch($shortcode->style)
        @case('style-3')
            {!! Theme::partial('shortcodes.quotation.' . $shortcode->style, compact('shortcode', 'tabs')) !!}
            @break
        @case('style-2')
        @default
            {!! Theme::partial('shortcodes.quotation.style-1', compact('shortcode', 'tabs')) !!}
    @endswitch
@endif
