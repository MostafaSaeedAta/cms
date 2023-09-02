<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Ecommerce\Models\Product;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Menu;
use Botble\Base\Facades\MetaBox;

class MenuSeeder extends BaseSeeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Main menu',
                'location' => 'main-menu',
                'items' => [
                    [
                        'title' => 'Home',
                        'url' => '/',
                        'child_style' => 'two_col',
                        'children' => [
                            [
                                'title' => 'Homepage 1',
                                'url' => '/',
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 2',
                                'reference_id' => 9,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 3',
                                'reference_id' => 10,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 4',
                                'reference_id' => 11,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 5',
                                'reference_id' => 12,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 6',
                                'reference_id' => 13,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 7',
                                'reference_id' => 14,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                            [
                                'title' => 'Homepage 8',
                                'reference_id' => 15,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-home',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Company',
                        'url' => '#',
                        'child_style' => 'hr_per_2_child',
                        'children' => [
                            [
                                'title' => 'Service',
                                'reference_id' => 6,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-gem',
                            ],
                            [
                                'title' => 'Service - 2',
                                'reference_id' => 16,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-headset',
                            ],
                            [
                                'title' => 'Pricing',
                                'reference_id' => 7,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-database',
                            ],
                            [
                                'title' => 'Pricing - 2',
                                'reference_id' => 17,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-database',
                            ],
                            [
                                'title' => 'FAQs',
                                'reference_id' => 8,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-headset',
                            ],
                            [
                                'title' => 'FAQs - 2',
                                'reference_id' => 18,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-headset',
                            ],
                            [
                                'title' => 'Career',
                                'reference_id' => 19,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-briefcase',
                            ],
                            [
                                'title' => 'Career Details',
                                'reference_id' => 20,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-briefcase',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Pages',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Contact',
                                'reference_id' => 3,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-paper-plane',
                            ],
                            [
                                'title' => 'About Us - 1',
                                'reference_id' => 5,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-star',
                            ],
                            [
                                'title' => 'About Us - 2',
                                'reference_id' => 21,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-star',
                            ],
                            [
                                'title' => 'About Us - 3',
                                'reference_id' => 22,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-star',
                            ],
                            [
                                'title' => 'Sign Up',
                                'url' => '/register',
                                'icon_font' => 'fi fi-rr-user-add',
                            ],
                            [
                                'title' => 'Log In',
                                'url' => '/login',
                                'icon_font' => 'fi fi-rr-fingerprint',
                            ],
                            [
                                'title' => 'Reset Password',
                                'url' => '/password/reset',
                                'icon_font' => 'fi fi-rr-settings',
                            ],
                            [
                                'title' => 'Error 404',
                                'url' => '404',
                                'icon_font' => 'fi fi-rr-exclamation',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Blog',
                        'reference_id' => 2,
                        'reference_type' => Page::class,
                        'child_style' => 'hr_per_2_child',
                        'children' => [
                            [
                                'title' => 'Blog Archive - 1',
                                'reference_id' => 2,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-edit',
                            ],
                            [
                                'title' => 'Blog Archive - 2',
                                'reference_id' => 23,
                                'reference_type' => Page::class,
                                'icon_font' => 'fi fi-rr-edit',
                            ],
                            [
                                'title' => 'Post Details',
                                'url' => Post::first()->url,
                                'icon_font' => 'fi fi-rr-document-signed',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Shop',
                        'url' => '#',
                        'children' => [
                            [
                                'title' => 'Shop Grid - 1',
                                'url' => '/products',
                                'icon_font' => 'fi fi-rr-edit',
                            ],
                            [
                                'title' => 'Shop Grid - 2',
                                'url' => '/products?layout=grid-2',
                                'icon_font' => 'fi fi-rr-edit',
                            ],
                            [
                                'title' => 'Product Details',
                                'url' => Product::first()->url,
                                'icon_font' => 'fi fi-rr-edit',
                            ],
                            [
                                'title' => 'Wishlist',
                                'url' => route('public.wishlist'),
                                'icon_font' => 'fi fi-rr-heart',
                            ],
                            [
                                'title' => 'Compare',
                                'url' => route('public.compare'),
                                'icon_font' => 'fi fi-rr-shuffle',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'About Us',
                'items' => [
                    [
                        'title' => 'Mission & Vision',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Our Team',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Careers',
                        'reference_id' => 19,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Press &amp; Media',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Advertising',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Testimonials',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Discover',
                'items' => [
                    [
                        'title' => 'Our Blog',
                        'reference_id' => 2,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Plans &amp; Pricing',
                        'reference_id' => 7,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Knowledge Base',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Cookie Policy',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Office Center',
                        'url' => '/',
                    ],
                    [
                        'title' => 'News &amp; Events',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Support',
                'items' => [
                    [
                        'title' => 'FAQs',
                        'reference_id' => 8,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Editor Help',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Community',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Live Chatting',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Contact Us',
                        'reference_id' => 3,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Support Center',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Useful links',
                'items' => [
                    [
                        'title' => 'Request an offer',
                        'url' => '/',
                    ],
                    [
                        'title' => 'How it works',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Pricing',
                        'reference_id' => 17,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Reviews',
                        'url' => '/',
                    ],
                    [
                        'title' => 'Stories',
                        'url' => '/',
                    ],
                ],
            ],
            [
                'name' => 'Footer bottom menu',
                'location' => 'footer-bottom-menu',
                'items' => [
                    [
                        'title' => 'Privacy policy',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Cookies',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                    [
                        'title' => 'Terms of service',
                        'reference_id' => 4,
                        'reference_type' => Page::class,
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        MetaBoxModel::where('reference_type', MenuNode::class)->delete();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        $locales = ['en_US', 'vi'];
        foreach ($menus as $index => $item) {
            foreach ($locales as $locale) {
                $item['name'] = Arr::get($this->trans(), $locale . '.' . $item['name'], $item['name']);
                $item['slug'] = Str::slug($item['name']);

                $this->saveMenu($item, $locale, $index);
            }
        }

        Menu::clearCacheMenuItems();
    }

    /**
     * @return array
     */
    protected function trans(): array
    {
        return [
            'vi' => [
                'Main menu' => 'Menu chính',
                'Home' => 'Trang chủ',
                'Homepage' => 'Trang chủ',
                'Homepage 1' => 'Trang chủ 1',
                'Homepage 2' => 'Trang chủ 2',
                'Homepage 3' => 'Trang chủ 3',
                'Homepage 4' => 'Trang chủ 4',
                'Homepage 5' => 'Trang chủ 5',
                'Homepage 6' => 'Trang chủ 6',
                'Homepage 7' => 'Trang chủ 7',
                'Homepage 8' => 'Trang chủ 8',
                'Contact' => 'Liên hệ',
                'About Us' => 'Về chúng tôi',
                'About' => 'Về chúng tôi',
                'Discover' => 'Khám phá',
                'Support' => 'Hổ trợ',
                'Useful links' => 'Liên kết hữu ích',
                'Company' => 'Công ty',
                'Footer bottom menu' => 'Menu dưới chân trang',
                'About Us - 1' => 'Về chúng tôi - 1',
                'About Us - 2' => 'Về chúng tôi - 2',
                'About Us - 3' => 'Về chúng tôi - 3',
                'Service' => 'Dịch vụ',
                'Service - 2' => 'Dịch vụ - 2',
                'Pages' => 'Trang',
                'Pricing' => 'Bảng giá',
                'Pricing - 2' => 'Bảng giá - 2',
                'Sign Up' => 'Đăng ký',
                'Log In' => 'Đăng Nhập',
                'Reset Password' => 'Quên mật khẩu',
                'Error 404' => 'Lỗi 404',
                'Blog Archive - 1' => 'Tin tức - 1',
                'Blog Archive - 2' => 'Tin tức - 2',
                'Post Detail' => 'Chi tiết tin tức',
                'Shop Grid - 1' => 'Sản phẩm - 1',
                'Shop Grid - 2' => 'Sản phẩm - 2',
                'Product Details' => 'Chi tiết sản phẩm',
            ],
        ];
    }

    protected function saveMenu(array $item, string $locale, int $index)
    {
        $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

        if (isset($item['location'])) {
            $menuLocation = MenuLocation::create([
                'menu_id' => $menu->id,
                'location' => $item['location'],
            ]);

            $originValue = LanguageMeta::where([
                'reference_id' => $locale == 'en_US' ? 1 : 2,
                'reference_type' => MenuLocation::class,
            ])->value('lang_meta_origin');

            LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
        }

        foreach ($item['items'] as $menuNode) {
            $this->createMenuNode($index, $menuNode, $locale, $menu->id);
        }

        $originValue = null;

        if ($locale !== 'en_US') {
            $originValue = LanguageMeta::where([
                'reference_id' => $index * 2 + 1,
                'reference_type' => MenuModel::class,
            ])->value('lang_meta_origin');
        }

        LanguageMeta::saveMetaData($menu, $locale, $originValue);
    }

    protected function createMenuNode(int $index, array $menuNode, string $locale, int|string $menuId, int|string $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;
        $menuNode['title'] = Arr::get($this->trans(), $locale . '.' . $menuNode['title'], $menuNode['title']);

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::create(Arr::except($menuNode, 'child_style'));

        if (Arr::has($menuNode, 'child_style')) {
            MetaBox::saveMetaBoxData($createdNode, 'child_style', Arr::get($menuNode, 'child_style'));
        }

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
