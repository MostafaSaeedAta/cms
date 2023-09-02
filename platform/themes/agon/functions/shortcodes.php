<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Facades\ProductCategoryHelper;
use Botble\Ecommerce\Repositories\Interfaces\ProductCategoryInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Botble\Faq\Contracts\Faq;
use Botble\Faq\FaqCollection;
use Botble\Faq\FaqItem;
use Botble\Faq\Repositories\Interfaces\FaqCategoryInterface;
use Botble\Faq\Repositories\Interfaces\FaqInterface;
use Botble\Testimonial\Repositories\Interfaces\TestimonialInterface;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;
use Botble\Theme\Supports\Youtube;
use Illuminate\Database\Eloquent\Collection;
use Botble\Ecommerce\Models\Product;


app()->booted(function () {
    ThemeSupport::registerGoogleMapsShortcode();

    add_shortcode('hero-banner', __('Hero banner'), __('Hero banner'), function ($shortcode) {
        return Theme::partial('shortcodes.hero-banner.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('hero-banner', function ($attributes) {
        return Theme::partial('shortcodes.hero-banner.admin-config', compact('attributes'));
    });

    add_shortcode('quotation', __('Quotation'), __('Quotation'), function ($shortcode) {
        return Theme::partial('shortcodes.quotation', compact('shortcode'));
    });

    shortcode()->setAdminConfig('quotation', function ($attributes) {
        return Theme::partial('shortcodes.quotation-admin-config', compact('attributes'));
    });

    add_shortcode('we-are-trusted', __('We are trusted'), __('We are trusted'), function ($shortcode) {
        return Theme::partial('shortcodes.we-are-trusted', compact('shortcode'));
    });

    shortcode()->setAdminConfig('we-are-trusted', function ($attributes) {
        return Theme::partial('shortcodes.we-are-trusted-admin-config', compact('attributes'));
    });

    add_shortcode('we-facilitate', __('We facilitate'), __('We facilitate'), function ($shortcode) {
        return Theme::partial('shortcodes.we-facilitate.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('we-facilitate', function ($attributes) {
        return Theme::partial('shortcodes.we-facilitate.admin-config', compact('attributes'));
    });

    add_shortcode('we-do-you-get', __('We do - You get'), __('We do - You get'), function ($shortcode) {
        return Theme::partial('shortcodes.we-do-you-get.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('we-do-you-get', function ($attributes) {
        return Theme::partial('shortcodes.we-do-you-get.admin-config', compact('attributes'));
    });

    add_shortcode('how-it-works', __('How It Works'), __('How It Works'), function ($shortcode) {
        return Theme::partial('shortcodes.how-it-works.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('how-it-works', function ($attributes) {
        return Theme::partial('shortcodes.how-it-works.admin-config', compact('attributes'));
    });

    add_shortcode('companies', __('Companies'), __('Companies'), function ($shortcode) {
        return Theme::partial('shortcodes.companies', compact('shortcode'));
    });

    shortcode()->setAdminConfig('companies', function ($attributes) {
        return Theme::partial('shortcodes.companies-admin-config', compact('attributes'));
    });

    add_shortcode('quotation', __('Quotation'), __('Quotation'), function ($shortcode) {
        return Theme::partial('shortcodes.quotation.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('quotation', function ($attributes) {
        return Theme::partial('shortcodes.quotation.admin-config', compact('attributes'));
    });

    add_shortcode('statistical', __('Statistical'), __('Statistical'), function ($shortcode) {
        return Theme::partial('shortcodes.statistical.index', compact('shortcode'));
    });

    shortcode()->setAdminConfig('statistical', function ($attributes) {
        return Theme::partial('shortcodes.statistical.admin-config', compact('attributes'));
    });

    add_shortcode('our-team', __('Our team'), __('Our team'), function ($shortcode) {
        return Theme::partial('shortcodes.our-team', compact('shortcode'));
    });

    shortcode()->setAdminConfig('our-team', function ($attributes) {
        return Theme::partial('shortcodes.our-team-admin-config', compact('attributes'));
    });

    add_shortcode('our-location', __('Our location'), __('Our location'), function ($shortcode) {
        return Theme::partial('shortcodes.our-location', compact('shortcode'));
    });

    shortcode()->setAdminConfig('our-location', function ($attributes) {
        return Theme::partial('shortcodes.our-location-admin-config', compact('attributes'));
    });

    add_shortcode('page-header', __('Page header'), __('Page header'), function ($shortcode) {
        return Theme::partial('shortcodes.page-header', compact('shortcode'));
    });

    shortcode()->setAdminConfig('page-header', function ($attributes) {
        return Theme::partial('shortcodes.page-header-admin-config', compact('attributes'));
    });

    if (is_plugin_active('testimonial')) {
        add_shortcode('testimonials', __('Testimonials'), __('Testimonials'), function ($shortcode) {
            $testimonials = app(TestimonialInterface::class)->advancedGet([
                'condition' => [
                    'status' => BaseStatusEnum::PUBLISHED,
                ],
                'take' => (int)$shortcode->number_of_displays,
            ]);

            return Theme::partial('shortcodes.testimonials.index', compact('shortcode', 'testimonials'));
        });

        shortcode()->setAdminConfig('testimonials', function ($attributes) {
            return Theme::partial('shortcodes.testimonials.admin-config', compact('attributes'));
        });
    }

    if (is_plugin_active('blog')) {
        add_shortcode('our-news', __('Our news'), __('Our news'), function ($shortcode) {
            $numberOfDisplays = (int)$shortcode->number_of_displays ?: 3;
            $category = null;
            $posts = collect([]);
            $with = ['categories:id,name', 'categories.slugable', 'author', 'slugable'];

            if ($shortcode->category_id) {
                $category = get_category_by_id($shortcode->category_id);
                if ($category) {
                    $posts = get_posts_by_category($category->id, 0, $numberOfDisplays);
                }
            }

            if (!$category) {
                $posts = match ($shortcode->type) {
                    'featured' => get_featured_posts($numberOfDisplays, $with),
                    'recent' => get_recent_posts($numberOfDisplays),
                    default => get_latest_posts($numberOfDisplays, $with),
                };
            }

            if ($posts instanceof Collection) {
                $posts->loadMissing($with);
            }

            return Theme::partial('shortcodes.blog.index', compact('shortcode', 'posts', 'category'));
        });

        shortcode()->setAdminConfig('our-news', function ($attributes) {
            $categories = [0 => __('-- None --')] + collect(get_categories_with_children())->pluck('name', 'id')->toArray();

            return Theme::partial('shortcodes.blog.admin-config', compact('attributes', 'categories'));
        });
    }

    if (is_plugin_active('newsletter')) {
        add_shortcode('newsletter', __('Newsletter'), __('Newsletter'), function ($shortcode) {
            return Theme::partial('shortcodes.newsletter', compact('shortcode'));
        });

        shortcode()->setAdminConfig('newsletter', function ($attributes) {
            return Theme::partial('shortcodes.newsletter-admin-config', compact('attributes'));
        });
    }

    if (is_plugin_active('contact')) {
        add_filter(CONTACT_FORM_TEMPLATE_VIEW, function () {
            return Theme::getThemeNamespace() . '::partials.shortcodes.contact-form';
        }, 120);

        shortcode()->setAdminConfig('contact-form', function ($attributes) {
            return Theme::partial('shortcodes.contact-form-admin-config', compact('attributes'));
        });
    }

    if (is_plugin_active('faq')) {
        add_shortcode('faq', __('FAQs'), __('FAQs'), function ($shortcode) {
            $condition = ['status' => BaseStatusEnum::PUBLISHED];

            if ($shortcode->category_ids) {
                $categoryIds = explode(',', $shortcode->category_ids);

                if ($categoryIds) {
                    $condition[] = ['category_id', 'IN', $categoryIds];
                }
            }

            $faqs = app(FaqInterface::class)->advancedGet([
                'condition' => $condition,
            ]);

            if (setting('enable_faq_schema', 0)) {
                $schemaItems = new FaqCollection();

                foreach ($faqs as $faq) {
                    $schemaItems->push(new FaqItem($faq->question, $faq->answer));
                }

                app(Faq::class)->registerSchema($schemaItems);
            }

            return Theme::partial('shortcodes.faq.index', compact('shortcode', 'faqs'));
        });

        shortcode()->setAdminConfig('faq', function ($attributes) {
            $categories = app(FaqCategoryInterface::class)->advancedGet([
                'with' => ['faqs'],
                'condition' => ['status' => BaseStatusEnum::PUBLISHED],
            ]);

            return Theme::partial('shortcodes.faq.admin-config', compact('attributes', 'categories'));
        });

        add_shortcode('faq-ask', __('FAQs Ask'), __('FAQs Ask'), function ($shortcode) {
            return Theme::partial('shortcodes.faq.ask', compact('shortcode'));
        });

        shortcode()->setAdminConfig('faq-ask', function ($attributes) {
            return Theme::partial('shortcodes.faq.ask-admin-config', compact('attributes'));
        });
    }

    add_shortcode('youtube-video', __('Youtube video'), __('Add youtube video'), function ($shortcode) {
        $url = Youtube::getYoutubeVideoEmbedURL($shortcode->content);

        return Theme::partial('shortcodes.youtube', compact('shortcode', 'url'));
    });

    shortcode()->setAdminConfig('youtube-video', function ($attributes, $content) {
        return Theme::partial('shortcodes.youtube-admin-config', compact('attributes', 'content'));
    });

    add_shortcode('apply-now', __('Apply now'), __('Apply now button and share'), function ($shortcode) {
        return Theme::partial('shortcodes.apply-now', compact('shortcode'));
    });

    shortcode()->setAdminConfig('apply-now', function ($attributes) {
        return Theme::partial('shortcodes.apply-now-admin-config', compact('attributes'));
    });

    add_shortcode('apps-download', __('Apps download'), __('Apps download'), function ($shortcode) {
        return Theme::partial('shortcodes.apps-download', compact('shortcode'));
    });

    shortcode()->setAdminConfig('apps-download', function ($attributes) {
        return Theme::partial('shortcodes.apps-download-admin-config', compact('attributes'));
    });

    add_shortcode('banner', __('banner'), __('banner'), function ($shortcode) {
        return Theme::partial('shortcodes.banners.banner',compact('shortcode'));
    });
    shortcode()->setAdminConfig('banner', function ($attributes) {
        return Theme::partial('shortcodes.banners.banner-admin-config', compact('attributes'));
    });

    if (is_plugin_active('ecommerce')) {
        add_shortcode('explore-by-categories', __('Explore by categories'), __('Explore by product categories'), function ($shortcode) {
            $limitLeft = (int) $shortcode->limit_left ?: 5;
            $limitRight = (int) $shortcode->limit_right ?: 5;
            $limit = $limitLeft + $limitRight;
            $categories = ProductCategoryHelper::getAllProductCategories()
                ->loadCount('products')
                ->where('status', BaseStatusEnum::PUBLISHED)
                ->take($limit);

            $categories = match ($shortcode->sort_by) {
                'featured' => $categories->sortByDesc('is_featured'),
                default => $categories->sortByDesc('products_count'),
            };

            return Theme::partial('shortcodes.ecommerce.explore-by-categories', compact('shortcode', 'categories', 'limitLeft', 'limitRight'));
        });

        shortcode()->setAdminConfig('explore-by-categories', function ($attributes) {
            return Theme::partial('shortcodes.ecommerce.explore-by-categories-admin-config', compact('attributes'));
        });

        add_shortcode('featured-products', __('Featured products'), __('Featured products'), function ($shortcode) {
            $products = get_featured_products([
                'take' => min((int) $shortcode->limit ?: 24, 120),
                'with' => [
                    'slugable',
                    'productCollections',
                    'categories',
                ],
            ] + EcommerceHelper::withReviewsParams());

            return Theme::partial('shortcodes.ecommerce.featured-products', compact('shortcode', 'products'));
        });

        shortcode()->setAdminConfig('featured-products', function ($attributes) {
            return Theme::partial('shortcodes.ecommerce.featured-products-admin-config', compact('attributes'));
        });

        add_shortcode('products-by-category', __('Products by category'), __('Products by category'), function ($shortcode) {
            $category = app(ProductCategoryInterface::class)->getFirstBy([
                'status' => BaseStatusEnum::PUBLISHED,
                'id' => $shortcode->category_id,
            ]);

            if (!$category) {
                return null;
            }

            $products = app(ProductInterface::class)->getProductsByCategories([
                'categories' => [
                    'by' => 'id',
                    'value_in' => array_merge([$category->id], $category->activeChildren->pluck('id')->all()),
                ],
                'take' => min((int)$shortcode->limit ?: 4, 24),
                'with' => [
                    'slugable',
                    'productCollections',
                ],
            ] + EcommerceHelper::withReviewsParams());

            return Theme::partial('shortcodes.ecommerce.products-by-category', compact('shortcode', 'products'));
        });

        shortcode()->setAdminConfig('products-by-category', function ($attributes) {
            $categories = ProductCategoryHelper::getProductCategoriesWithIndent('↳');
            $categories = $categories->transform(function ($item) {
                $item->name = $item->indent_text . $item->name;

                return $item;
            })->pluck('name', 'id')->toArray();

            return Theme::partial('shortcodes.ecommerce.products-by-category-admin-config', compact('attributes', 'categories'));
        });

        add_shortcode('product-categories', __('Product categories'), __('Product categories'), function ($shortcode) {
            $limit = (int) $shortcode->limit ?: 5;
            $categories = ProductCategoryHelper::getAllProductCategories()
                ->loadCount('products')
                ->where('status', BaseStatusEnum::PUBLISHED)
                ->take($limit);

            // $categories = match ($shortcode->sort_by) {
            //     'newst' => $categories->sortByDesc('created_at'),
            //     default => $categories->sortBy([['created_at','asc']]),
            // };

            return Theme::partial('shortcodes.ecommerce.dispaly-categories', compact('shortcode', 'categories', 'limit'));
        });

        shortcode()->setAdminConfig('product-categories', function ($attributes) {
            return Theme::partial('shortcodes.ecommerce.categories-admin-config', compact('attributes'));
        });
        add_shortcode('new-products-section', __('New products section'), __('New products section'), function ($shortcode) {
            $limit = (int) $shortcode->limit ?: 5;

            $with = [
                'slugable',
                'variations',
                'productLabels',
                'variationAttributeSwatchesForProductList',
                'productCollections',
            ];

            $products = Product::with($with)->take($limit);
            if ($shortcode->sort_by == 'newst') {
                $products = $products->orderBy('created_at', 'desc')->get();
            } elseif ($shortcode->sort_by == 'oldest') {
                $products = $products->orderBy('created_at', 'asc')->get();
            } else {
                $products =  $products->inRandomOrder()->get();
            }

            // $matches = match ($shortcode->sort_by) {
            //     'newst' => $products->orderBy([['created_at', 'desc']]),
            //     'oldest' => $products->orderBy([['created_at','asc']]),
            //     'random'=> $products->shuffle(),
            // };

            return Theme::partial('shortcodes.ecommerce.new-products-section', compact('shortcode', 'products'));
        });

        shortcode()->setAdminConfig('new-products-section', function ($attributes) {
            return Theme::partial('shortcodes.ecommerce.new-products-admin-config', compact('attributes'));
        });
    }
});
