<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Models\Widget;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Theme;

class WidgetSeeder extends BaseSeeder
{
    public function run(): void
    {
        Widget::truncate();

        $widgets = [
            [
                'widget_id' => 'SiteInfoWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'SiteInfoWidget',
                    'name' => 'Contact',
                    'address' => '4517 Washington Ave. Manchester, Kentucky 39495',
                    'phone' => '(239) 555-0108',
                    'email' => 'contact@agon.com',
                ],
            ],
            [
                'widget_id' => 'CustomMenuWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'CustomMenuWidget',
                    'name' => 'About Us',
                    'menu_id' => 'about-us',
                ],
            ],
            [
                'widget_id' => 'CustomMenuWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'CustomMenuWidget',
                    'name' => 'Discover',
                    'menu_id' => 'discover',
                ],
            ],
            [
                'widget_id' => 'CustomMenuWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 3,
                'data' => [
                    'id' => 'CustomMenuWidget',
                    'name' => 'Support',
                    'menu_id' => 'support',
                ],
            ],
            [
                'widget_id' => 'CustomMenuWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 4,
                'data' => [
                    'id' => 'CustomMenuWidget',
                    'name' => 'Useful links',
                    'menu_id' => 'useful-links',
                ],
            ],
            [
                'widget_id' => 'ProductsWidget',
                'sidebar_id' => 'product_list_sidebar',
                'position' => 0,
                'data' => [
                    'id' => 'ProductsWidget',
                    'name' => 'Popular Items',
                    'number_of_displays' => '6',
                    'type' => 'trending',
                ],
            ],
            [
                'widget_id' => 'NewsletterWidget',
                'sidebar_id' => 'product_list_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'NewsletterWidget',
                    'title' => 'Get free coupons',
                    'subtitle' => 'Enter you email address and get free coupons.',
                ],
            ],
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'product_list_bottom_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'BlogPostsWidget',
                    'title' => 'What’s new',
                    'subtitle' => 'From Our blog and Event fanpage',
                    'number_display' => 6,
                ],
            ],
            [
                'widget_id' => 'AppsDownloadWidget',
                'sidebar_id' => 'pre_footer_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'AppsDownloadWidget',
                    'title' => 'You can order on App and Play store',
                    'subtitle' => 'Bring the world of shopping to your phone',
                    'ios_image' => 'general/apple-button.png',
                    'ios_link' => '#',
                    'android_image' => 'general/google-play.png',
                    'android_link' => '#',
                    'image_1' => 'general/safety.png',
                    'image_2' => 'general/chart-2.png',
                    'background' => 'general/bg-app.png',
                    'featured' => 'Order direct from the app;Save and searches',
                ],
            ],
        ];

        $theme = Theme::getThemeName();

        $trans = [
            'vi' => [
                'About Us' => 'Về chúng tôi',
                'Discover' => 'Khám phá',
                'Support' => 'Hổ trợ',
                'Useful links' => 'Liên kết hữu ích',
                'Ready to get started?' => 'Sẵn sàng để bắt đầu?',
                'Create an Account' => 'Tạo tài khoản',
                'Get free coupons' => 'Nhận phiếu giảm giá miễn phí',
                'Contact' => 'Liên hệ',
            ],
        ];

        $locales = ['en_US', 'vi'];

        foreach ($widgets as $widget) {
            foreach ($locales as $locale) {
                $widget['theme'] = $locale == 'en_US' ? $theme : ($theme . '-' . $locale);

                foreach ($widget['data'] as $key => $value) {
                    if ($key == 'id') {
                        continue;
                    }

                    if ($key == 'menu_id') {
                        $widget['data'][$key] = Str::slug($widget['data']['name']);

                        continue;
                    }

                    $widget['data'][$key] = Arr::get($trans, $locale . '.' . $value, $value);
                }
                Widget::create($widget);
            }
        }
    }
}
