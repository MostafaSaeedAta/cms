<?php

use Botble\Widget\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('categories'),
            'description' => __('Widget display categories tags'),
            'number_of_display' => '6',
        ]);
    }
}
