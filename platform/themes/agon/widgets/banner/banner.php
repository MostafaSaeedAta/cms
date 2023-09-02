<?php

use Botble\Widget\AbstractWidget;

class BannerWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Banner'),
            'description' => __('Widget display banner in product details sidebar'),
            // 'description' => __('Widget display site information'),
            'title' => '',
            // 'subtitle' => '',
            // 'link' => '',
            'image' => '',
        ]);
    }
}
