<?php

namespace Botble\Ecommerce\Services;

use Botble\Ecommerce\Models\Discount;
use Botble\Ecommerce\Repositories\Interfaces\DiscountInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Carbon\Carbon;
use Botble\Ecommerce\Facades\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Botble\Ecommerce\Facades\OrderHelper;

class HandleApplyCouponService
{
    public function __construct(protected DiscountInterface $discountRepository, protected ProductInterface $productRepository)
    {
    }

    public function execute(string $coupon, array $sessionData = [], array $cartData = [], ?string $prefix = ''): array
    {
        $token = OrderHelper::getOrderSessionToken();

        if (! $token) {
            $token = OrderHelper::getOrderSessionToken();
        }

        if (! $sessionData) {
            $sessionData = OrderHelper::getOrderSessionData($token);
        }
        $rawTotal = Arr::get($cartData, 'rawTotal', Cart::instance('cart')->rawTotal());

        $sessionData['raw_total'] = $rawTotal;

        $couponCode = trim($coupon);

        $discount = $this->getCouponData($couponCode, $sessionData);

        if (! $discount) {
            return [
                'error' => true,
                'message' => trans('plugins/ecommerce::discount.invalid_coupon'),
            ];
        }

        $customerId = auth('customer')->check() ? auth('customer')->id() : 0;

        $resultCondition = $this->checkConditionDiscount($discount, $sessionData, $customerId);
        if (Arr::get($resultCondition, 'error')) {
            return $resultCondition;
        }

        $couponDiscountAmount = 0;
        $isFreeShipping = false;
        $discountTypeOption = null;
        $validCartItemIds = [];

        if ($discount->type_option == 'shipping') {
            $isFreeShipping = true;
        } else {
            $discountTypeOption = $discount->type_option;
            $couponData = $this->getCouponDiscountAmount($discount, $cartData);
            $couponDiscountAmount = Arr::get($couponData, 'discount_amount', 0);
            $validCartItemIds = Arr::get($couponData, 'valid_cart_item_ids', 0);
        }

        if ($couponDiscountAmount < 0) {
            $couponDiscountAmount = 0;
        }

        if ($isFreeShipping) {
            if ($prefix) {
                Arr::set($sessionData, $prefix . 'is_free_shipping', true);
            } else {
                Arr::set($sessionData, 'is_free_shipping', true);
            }
        }

        if ($prefix) {
            switch ($discountTypeOption) {
                case 'percentage':
                case 'same-price':
                    Arr::set($sessionData, $prefix . 'coupon_discount_amount', $couponDiscountAmount);

                    break;
                default:
                    Arr::set($sessionData, $prefix . 'coupon_discount_amount', 0);

                    break;
            }
        } else {
            Arr::set($sessionData, 'coupon_discount_amount', $couponDiscountAmount);
        }

        OrderHelper::setOrderSessionData($token, $sessionData);

        session()->put('applied_coupon_code', $couponCode);

        return [
            'error' => false,
            'data' => [
                'discount_amount' => $couponDiscountAmount,
                'is_free_shipping' => $isFreeShipping,
                'discount_type_option' => $discount->type_option,
                'discount' => $discount,
                'valid_cart_item_ids' => $validCartItemIds,
            ],
        ];
    }

    public function getCouponData(string $couponCode, array $sessionData = []): Discount|null
    {
        $couponCode = trim($couponCode);

        return $this->discountRepository
            ->getModel()
            ->where('code', $couponCode)
            ->where('type', 'coupon')
            ->where('start_date', '<=', Carbon::now())
            ->where(function (Builder $query) use ($sessionData) {
                $query
                    ->where(function (Builder $sub) {
                        return $sub
                            ->whereIn('type_option', ['amount', 'percentage'])
                            ->where(function (Builder $subSub) {
                                return $subSub
                                    ->whereNull('end_date')
                                    ->orWhere('end_date', '>=', Carbon::now());
                            });
                    })
                    ->orWhere(function (Builder $sub) use ($sessionData) {
                        return $sub
                            ->where('type_option', 'shipping')
                            ->where('value', '<=', Arr::get($sessionData, 'raw_total', 0))
                            ->where(function (Builder $subSub) {
                                return $subSub
                                    ->whereNull('target')
                                    ->orWhere('target', 'all-orders');
                            });
                    })
                    ->orWhere(function (Builder $sub) {
                        return $sub
                            ->where('type_option', 'same-price')
                            ->whereIn('target', ['group-products', 'specific-product', 'product-variant']);
                    });
            })
            ->where(function (Builder $query) {
                return $query
                    ->whereNull('quantity')
                    ->orWhereColumn('quantity', '>', 'total_used');
            })
            ->first();
    }

    public function applyCouponWhenCreatingOrderFromAdmin(Request $request, array $cartData = []): array
    {
        $couponCode = trim($request->input('coupon_code'));
        $rawTotal = Arr::get($cartData, 'rawTotal', $request->input('sub_amount'));

        $sessionData = [
            'shipping_amount' => $request->input('shipping_amount'),
            'state' => $request->input('state'),
            'raw_total' => $rawTotal,
            'promotion_discount_amount' => Arr::get($cartData, 'promotion_discount_amount', $request->input('promotion_amount')),
        ];

        $discount = $this->getCouponData($couponCode, $sessionData);

        if (! $discount) {
            return [
                'error' => true,
                'message' => trans('plugins/ecommerce::discount.invalid_coupon'),
            ];
        }

        $customerId = $request->input('customer_id');
        $resultCondition = $this->checkConditionDiscount($discount, $sessionData, $customerId);
        if (Arr::get($resultCondition, 'error')) {
            return $resultCondition;
        }

        $couponDiscountAmount = 0;
        $isFreeShipping = false;

        if ($discount->type_option == 'shipping') {
            $isFreeShipping = true;
        } else {
            $couponData = $this->getCouponDiscountAmount($discount, $cartData);
            $couponDiscountAmount = Arr::get($couponData, 'discount_amount', 0);
        }

        if ($couponDiscountAmount < 0) {
            $couponDiscountAmount = 0;
        }

        return [
            'error' => false,
            'data' => [
                'discount_amount' => $couponDiscountAmount,
                'is_free_shipping' => $isFreeShipping,
                'discount' => $discount,
            ],
        ];
    }

    public function checkConditionDiscount(Discount|Model $discount, array $sessionData = [], ?int $customerId = 0): array
    {
        /**
         * @var Discount $discount
         */
        if ($discount->target === 'customer') {
            $discountCustomers = $discount->customers->pluck('id')->all();
            if (! $customerId || ! in_array($customerId, $discountCustomers)) {
                return [
                    'error' => true,
                    'message' => trans('plugins/ecommerce::discount.invalid_coupon'),
                ];
            }
        }

        if ($discount->target === 'once-per-customer') {
            if (! $customerId) {
                return [
                    'error' => true,
                    'message' => trans('plugins/ecommerce::discount.you_need_login_to_use_coupon_code'),
                ];
            } elseif ($discount->usedByCustomers()->where('customer_id', auth('customer')->id())->count()) {
                return [
                    'error' => true,
                    'message' => trans('plugins/ecommerce::discount.you_used_coupon_code'),
                ];
            }
        }

        if (! $discount->can_use_with_promotion && (float)Arr::get($sessionData, 'promotion_discount_amount')) {
            return [
                'error' => true,
                'message' => trans('plugins/ecommerce::discount.cannot_use_same_time_with_other_discount_program'),
            ];
        }

        $rawTotal = (float)Arr::get($sessionData, 'raw_total');

        if (in_array($discount->type_option, ['amount', 'percentage']) && $discount->target == 'amount-minimum-order' && $discount->min_order_price > $rawTotal) {
            return [
                'error' => true,
                'message' => trans('plugins/ecommerce::discount.minimum_order_amount_error', [
                    'minimum_amount' => format_price($discount->min_order_price),
                    'add_more' => format_price($rawTotal - $discount->min_order_price),
                ]),
            ];
        }

        return [
            'error' => false,
        ];
    }

    protected function getCouponDiscountAmount(Discount|Model $discount, array $cartData = []): array
    {
        /**
         * @var Discount $discount
         */

        $couponDiscountAmount = 0;
        $discountValue = max($discount->value, 0);
        $rawTotal = Arr::get($cartData, 'rawTotal', Cart::instance('cart')->rawTotal());
        $cartItems = Arr::get($cartData, 'cartItems', Cart::instance('cart')->content());
        $countCart = Arr::get($cartData, 'countCart', Cart::instance('cart')->count());
        $products = Arr::get($cartData, 'productItems', Cart::instance('cart')->products());

        if (! $products instanceof Collection) {
            $products = new Collection($products);
        }

        $validCartItems = collect();

        switch ($discount->type_option) {
            case 'amount':
                switch ($discount->target) {
                    case 'amount-minimum-order':
                    case 'all-orders':
                        $couponDiscountAmount += min($discountValue, $rawTotal);

                        break;
                    case 'specific-product':
                        $discountProductIds = $discount->products->pluck('id')->all();

                        $products->loadMissing(['variationInfo', 'variationInfo.configurableProduct']);
                        $validCartItems = $cartItems->filter(function ($cartItem) use ($products, $discountProductIds) {
                            $product = $products->filter(function ($item) use ($cartItem) {
                                return $item->id == $cartItem->id || $item->original_product->id == $cartItem->id;
                            })->first();
                            if (! $product) {
                                return false;
                            }
                            if (in_array($product->original_product->id, $discountProductIds)) {
                                return true;
                            }

                            return false;
                        });

                        if ($discount->discount_on === 'per-order') {
                            $validRawTotal = Cart::instance('cart')->rawTotalByItems($validCartItems);
                            $couponDiscountAmount += min($discountValue, $validRawTotal);
                        } elseif ($discount->discount_on === 'per-every-item') {
                            foreach ($validCartItems as $cartItem) {
                                $couponDiscountAmount += min($discountValue * $cartItem->qty, $cartItem->total);
                            }
                        }

                        break;
                    case 'product-variant':
                        $discountProductIds = $discount->products->pluck('id')->all();

                        $validCartItems = $cartItems->filter(function ($cartItem) use ($discountProductIds) {
                            if (in_array($cartItem->id, $discountProductIds)) {
                                return true;
                            }

                            return false;
                        });

                        if ($discount->discount_on === 'per-order') {
                            $validRawTotal = Cart::instance('cart')->rawTotalByItems($validCartItems);
                            $couponDiscountAmount += min($discountValue, $validRawTotal);
                        } elseif ($discount->discount_on === 'per-every-item') {
                            foreach ($validCartItems as $cartItem) {
                                $couponDiscountAmount += min($discountValue * $cartItem->qty, $cartItem->total);
                            }
                        }

                        break;
                    case 'group-products':
                        $products->loadMissing([
                            'variationInfo',
                            'productCollections',
                            'variationInfo.configurableProduct',
                            'variationInfo.configurableProduct.productCollections',
                        ]);

                        $discountProductCollections = $discount
                            ->productCollections()
                            ->pluck('ec_product_collections.id')
                            ->all();

                        $validCartItems = $cartItems->filter(function ($cartItem) use ($products, $discountProductCollections) {
                            $product = $products->filter(function ($item) use ($cartItem) {
                                return $item->id == $cartItem->id || $item->original_product->id == $cartItem->id;
                            })->first();
                            if (! $product) {
                                return false;
                            }

                            $productCollections = $product->original_product->productCollections->pluck('id')->all();

                            if (! empty(array_intersect($productCollections, $discountProductCollections))) {
                                return true;
                            }

                            return false;
                        });

                        if ($discount->discount_on === 'per-order') {
                            $validRawTotal = Cart::instance('cart')->rawTotalByItems($validCartItems);
                            $couponDiscountAmount += min($discountValue, $validRawTotal);
                        } elseif ($discount->discount_on === 'per-every-item') {
                            foreach ($validCartItems as $cartItem) {
                                $couponDiscountAmount += min($discountValue * $cartItem->qty, $cartItem->total);
                            }
                        }

                        break;
                    default:
                        if ($countCart >= $discount->product_quantity) {
                            $couponDiscountAmount += min($discountValue, $rawTotal);
                        }

                        break;
                }

                break;
            case 'percentage':
                switch ($discount->target) {
                    case 'amount-minimum-order':
                    case 'all-orders':
                        $couponDiscountAmount = $rawTotal * $discountValue / 100;

                        break;
                    case 'specific-product':
                        $discountProductIds = $discount->products->pluck('id')->all();
                        $products->loadMissing(['variationInfo', 'variationInfo.configurableProduct']);

                        $validCartItems = $cartItems->filter(function ($cartItem) use ($products, $discountProductIds) {
                            $product = $products->filter(function ($item) use ($cartItem) {
                                return $item->id == $cartItem->id || $item->original_product->id == $cartItem->id;
                            })->first();

                            if (! $product) {
                                return false;
                            }

                            if (in_array($product->original_product->id, $discountProductIds)) {
                                return true;
                            }

                            return false;
                        });

                        foreach ($validCartItems as $cartItem) {
                            $couponDiscountAmount += $cartItem->total * $discountValue / 100;
                        }

                        break;
                    case 'product-variant':
                        $discountProductIds = $discount->products->pluck('id')->all();

                        $validCartItems = $cartItems->filter(function ($cartItem) use ($discountProductIds) {
                            if (in_array($cartItem->id, $discountProductIds)) {
                                return true;
                            }

                            return false;
                        });
                        foreach ($validCartItems as $cartItem) {
                            $couponDiscountAmount += $cartItem->total * $discountValue / 100;
                        }

                        break;
                    case 'group-products':
                        $products->loadMissing([
                            'variationInfo',
                            'productCollections',
                            'variationInfo.configurableProduct',
                            'variationInfo.configurableProduct.productCollections',
                        ]);
                        $discountProductCollections = $discount
                            ->productCollections()
                            ->pluck('ec_product_collections.id')
                            ->all();

                        $validCartItems = $cartItems->filter(function ($cartItem) use ($products, $discountProductCollections) {
                            $product = $products->filter(function ($item) use ($cartItem) {
                                return $item->id == $cartItem->id || $item->original_product->id == $cartItem->id;
                            })->first();
                            if (! $product) {
                                return false;
                            }

                            $productCollections = $product->original_product->productCollections->pluck('id')->all();

                            if (! empty(array_intersect($productCollections, $discountProductCollections))) {
                                return true;
                            }

                            return false;
                        });
                        foreach ($validCartItems as $cartItem) {
                            $couponDiscountAmount += $cartItem->total * $discountValue / 100;
                        }

                        break;
                    default:
                        if ($countCart >= $discount->product_quantity) {
                            $couponDiscountAmount += $rawTotal * $discountValue / 100;
                        }

                        break;
                }

                break;
            case 'same-price':
                if (in_array($discount->target, ['specific-product', 'product-variant'])) {
                    foreach ($cartItems as $cartItem) {
                        if (in_array($cartItem->id, $discount->products->pluck('id')->all())) {
                            $couponDiscountAmount = max($cartItem->priceTax - $discountValue, $cartItem->priceTax) * $cartItem->qty;
                        }
                    }
                } elseif ($discount->target == 'group-products') {
                    $products->loadMissing([
                        'variationInfo',
                        'productCollections',
                        'variationInfo.configurableProduct',
                        'variationInfo.configurableProduct.productCollections',
                    ]);
                    $discountProductCollections = $discount
                        ->productCollections()
                        ->pluck('ec_product_collections.id')
                        ->all();

                    $validCartItems = $cartItems->filter(function ($cartItem) use ($products, $discountProductCollections) {
                        $product = $products->filter(function ($item) use ($cartItem) {
                            return $item->id == $cartItem->id || $item->original_product->id == $cartItem->id;
                        })->first();
                        if (! $product) {
                            return false;
                        }

                        $productCollections = $product->original_product->productCollections->pluck('id')->all();

                        if (! empty(array_intersect($productCollections, $discountProductCollections))) {
                            return true;
                        }

                        return false;
                    });
                    foreach ($validCartItems as $cartItem) {
                        $couponDiscountAmount += max($cartItem->total - $discountValue, $cartItem->total) * $cartItem->qty;
                    }
                }

                break;
        }

        return [
            'discount_amount' => $couponDiscountAmount,
            'valid_cart_item_ids' => $validCartItems->pluck('id'),
        ];
    }
}
