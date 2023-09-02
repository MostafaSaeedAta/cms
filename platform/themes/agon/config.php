<?php

use Botble\Base\Facades\BaseHelper;
use Botble\Shortcode\View\View;
use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these events can be overridden by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function ($theme) {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function (Theme $theme) {
            if (is_plugin_active('ecommerce')) {
                $theme->partialComposer('header-top', function ($view) {
                    $view->with('currencies', get_all_currencies());
                });
            }

            $version = get_cms_version();

            $theme->asset()->usePath()->add('normalize-css', 'plugins/normalize.css');

            if (BaseHelper::siteLanguageDirection() == 'rtl') {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap.rtl.min.css');
            } else {
                $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap.min.css');
            }

            $theme->asset()->usePath()->add('swiper-css', 'plugins/swiper-bundle.min.css');
            $theme->asset()->usePath()->add('magnific-popup-css', 'plugins/magnific-popup.css');
            $theme->asset()->usePath()->add('select2-css', 'plugins/select2.min.css');

            if (theme_option('animation_enabled', 'yes') == 'yes') {
                $theme->asset()->usePath()->add('animate-css', 'plugins/animate.min.css');
            }

            $theme->asset()->usePath()->add('slick-css', 'plugins/slick.css');

            $theme->asset()
                ->styleUsingPath('style', 'css/style.css?v=' . $version)
                ->styleUsingPath('uicons-regular-rounded', 'plugins/uicons-regular-rounded.css');

            // Add vendor scripts and theme script.
            $vendorDir = 'plugins/';

            $theme
                ->asset()
                ->container('footer')
                ->scriptUsingPath('modernizr', $vendorDir . 'modernizr-3.6.0.min.js')
                ->scriptUsingPath('jquery', $vendorDir . 'jquery-3.6.0.min.js')
                ->scriptUsingPath('jquery-migrate-3', $vendorDir . 'jquery-migrate-3.3.0.min.js')
                ->scriptUsingPath('bootstrap', $vendorDir . 'bootstrap.bundle.min.js')
                ->scriptUsingPath('waypoints', $vendorDir . 'waypoints.js')
                ->scriptUsingPath('wow', $vendorDir . 'wow.js')
                ->scriptUsingPath('magnific', $vendorDir . 'magnific-popup.js')
                ->scriptUsingPath('select2', $vendorDir . 'select2.min.js')
                ->scriptUsingPath('isotope', $vendorDir . 'isotope.js')
                ->scriptUsingPath('counterup', $vendorDir . 'counterup.js')
                ->scriptUsingPath('slick', $vendorDir . 'slick.js')
                ->scriptUsingPath('swiper', $vendorDir . 'swiper-bundle.min.js')
                ->scriptUsingPath('noUISlider', $vendorDir . 'noUISlider.js')
                ->scriptUsingPath('slider', $vendorDir . 'slider.js')
                ->scriptUsingPath('countdown', $vendorDir . 'jquery.countdown.min.js')
                ->scriptUsingPath('script', 'js/script.js?v=' . $version)
                ->scriptUsingPath('main', 'js/main.js?v=' . $version);

            if (is_plugin_active('ecommerce')) {
                $theme->asset()->styleUsingPath('lightgallery', 'plugins/lightgallery/css/lightgallery.min.css');

                $theme
                    ->asset()
                    ->container('footer')
                    ->scriptUsingPath('lightgallery', $vendorDir . 'lightgallery/lightgallery.min.js')
                    ->scriptUsingPath('ecommerce', 'js/ecommerce.js?v=' . $version)
                    ->scriptUsingPath('app', 'js/app.js?v=' . $version);
            }

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'ecommerce.product'], function (View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function ($theme) {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            },
        ],
    ],
];
