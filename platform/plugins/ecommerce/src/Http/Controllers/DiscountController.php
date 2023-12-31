<?php

namespace Botble\Ecommerce\Http\Controllers;

use Botble\Base\Facades\Assets;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Ecommerce\Http\Requests\DiscountRequest;
use Botble\Ecommerce\Models\Discount;
use Botble\Ecommerce\Repositories\Interfaces\DiscountInterface;
use Botble\Ecommerce\Repositories\Interfaces\ProductInterface;
use Botble\Ecommerce\Tables\DiscountTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DiscountController extends BaseController
{
    public function __construct(protected DiscountInterface $discountRepository)
    {
    }

    public function index(DiscountTable $dataTable)
    {
        PageTitle::setTitle(trans('plugins/ecommerce::discount.name'));

        Assets::addStylesDirectly(['vendor/core/plugins/ecommerce/css/ecommerce.css']);

        return $dataTable->renderTable();
    }

    public function create()
    {
        PageTitle::setTitle(trans('plugins/ecommerce::discount.create'));

        Assets::addStylesDirectly(['vendor/core/plugins/ecommerce/css/ecommerce.css'])
            ->addScriptsDirectly([
                'vendor/core/plugins/ecommerce/js/discount.js',
            ])
            ->addScripts(['timepicker', 'input-mask', 'blockui'])
            ->addStyles(['timepicker']);

        Assets::usingVueJS();

        return view('plugins/ecommerce::discounts.create');
    }

    public function store(DiscountRequest $request, BaseHttpResponse $response)
    {
        if (! $request->has('can_use_with_promotion')) {
            $request->merge(['can_use_with_promotion' => 0]);
        }

        if ($request->input('is_unlimited')) {
            $request->merge(['quantity' => null]);
        }

        $request->merge([
            'start_date' => Carbon::parse($request->input('start_date') . ' ' . $request->input('start_time'))
                ->toDateTimeString(),
        ]);

        if ($request->has('end_date') && ! $request->has('unlimited_time')) {
            $request->merge([
                'end_date' => Carbon::parse($request->input('end_date') . ' ' . $request->input('end_time'))
                    ->toDateTimeString(),
            ]);
        } else {
            $request->merge([
                'end_date' => null,
            ]);
        }

        /**
         * @var Discount $discount
         */
        $discount = $this->discountRepository->createOrUpdate($request->input());

        if ($discount) {
            $productCollections = $request->input('product_collections');
            if ($productCollections) {
                if (! is_array($productCollections)) {
                    $productCollections = [$productCollections];
                    $discount->productCollections()->attach($productCollections);
                }
            }

            $products = $request->input('products');

            if ($products) {
                if (is_string($products) && Str::contains($products, ',')) {
                    $products = explode(',', $products);
                }

                if (! is_array($products)) {
                    $products = [$products];
                }

                foreach ($products as $productId) {
                    $product = app(ProductInterface::class)->findById($productId);

                    if (! $product || $product->is_variation) {
                        Arr::forget($products, $productId);
                    }

                    $products = array_merge($products, $product->variations()->pluck('product_id')->all());
                }

                $discount->products()->attach(array_unique($products));
            }

            $variants = $request->input('variants');
            if ($variants) {
                if (is_string($variants) && Str::contains($variants, ',')) {
                    $variants = explode(',', $variants);
                }

                if (! is_array($variants)) {
                    $variants = [$variants];
                }

                foreach ($variants as $variantId) {
                    $product = app(ProductInterface::class)->findById($variantId);

                    if (! $product || ! $product->is_variation || ! $product->original_product->id) {
                        Arr::forget($products, $product->id);
                    }

                    $variants = array_merge($variants, [$product->original_product->id]);
                }

                $discount->products()->attach(array_unique($variants));
            }

            $customers = $request->input('customers');
            if ($customers) {
                if (is_string($customers) && Str::contains($customers, ',')) {
                    $customers = explode(',', $customers);
                }

                if (! is_array($customers)) {
                    $customers = [$customers];
                }

                $discount->customers()->attach(array_unique($customers));
            }
        }

        event(new CreatedContentEvent(DISCOUNT_MODULE_SCREEN_NAME, $request, $discount));

        return $response
            ->setNextUrl(route('discounts.index'))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    public function destroy(int|string $id, Request $request, BaseHttpResponse $response)
    {
        try {
            $discount = $this->discountRepository->findOrFail($id);
            $this->discountRepository->delete($discount);
            event(new DeletedContentEvent(DISCOUNT_MODULE_SCREEN_NAME, $request, $discount));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $discount = $this->discountRepository->findOrFail($id);
            $this->discountRepository->delete($discount);
            event(new DeletedContentEvent(DISCOUNT_MODULE_SCREEN_NAME, $request, $discount));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    public function postGenerateCoupon(BaseHttpResponse $response)
    {
        do {
            $code = strtoupper(Str::random(12));
        } while ($this->discountRepository->count(['code' => $code]) > 0);

        return $response->setData($code);
    }
}
