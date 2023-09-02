<?php

use Botble\Widget\AbstractWidget;

class BrandWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('brands'),
            'description' => __('Widget display brands in product details sidebar'),
            'number_of_display' => '6',
        ]);
    }
}
