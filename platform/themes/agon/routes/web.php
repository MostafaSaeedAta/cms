<?php

use Botble\Theme\Facades\Theme;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Theme\Agon\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::group([
            'prefix' => 'ajax',
            'as' => 'public.ajax.',
        ], function () {
            Route::controller('EcommerceController')->group(function () {
                Route::get('search-products', [
                    'uses' => 'ajaxSearchProducts',
                    'as' => 'search-products',
                ]);

                Route::get('products', [
                    'uses' => 'ajaxGetProducts',
                    'as' => 'products',
                ]);

                Route::get('featured-product-categories', [
                    'uses' => 'ajaxGetFeaturedProductCategories',
                    'as' => 'featured-product-categories',
                ]);

                Route::get('featured-brands', [
                    'uses' => 'ajaxGetFeaturedBrands',
                    'as' => 'featured-brands',
                ]);

                Route::get('get-flash-sale/{id}', [
                    'uses' => 'ajaxGetFlashSale',
                    'as' => 'get-flash-sale',
                ]);

                Route::get('product-categories/products', [
                    'uses' => 'ajaxGetProductsByCategoryId',
                    'as' => 'product-category-products',
                ]);

                Route::get('featured-products', [
                    'uses' => 'ajaxGetFeaturedProducts',
                    'as' => 'featured-products',
                ]);

                Route::get('cart', [
                    'uses' => 'ajaxCart',
                    'as' => 'cart',
                ]);

                Route::get('quick-view/{id?}', [
                    'uses' => 'ajaxGetQuickView',
                    'as' => 'quick-view',
                ]);

                Route::post('add-to-wishlist/{id?}', [
                    'uses' => 'ajaxAddProductToWishlist',
                    'as' => 'add-to-wishlist',
                ]);

                Route::get('related-products/{id}', [
                    'uses' => 'ajaxGetRelatedProducts',
                    'as' => 'related-products',
                ]);

                Route::get('product-reviews/{id}', [
                    'uses' => 'ajaxGetProductReviews',
                    'as' => 'product-reviews',
                ]);

                Route::get('recently-viewed-products', [
                    'uses' => 'ajaxGetRecentlyViewedProducts',
                    'as' => 'recently-viewed-products',
                ]);
            });
        });
    });
});

Theme::routes();
