<?php

namespace Botble\Mollie\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Payment\Enums\PaymentStatusEnum;
use Botble\Payment\Supports\PaymentHelper;
use Illuminate\Http\Request;
use Mollie;
use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;
use Mollie\Api\Types\PaymentStatus;

class MollieController extends BaseController
{
    public function paymentCallback(Request $request, BaseHttpResponse $response)
    {
        try {
            /**
             * @var MollieApiClient $api
             */
            $api = Mollie::api();

            $result = $api->payments->get($request->input('id'));
        } catch (ApiException $exception) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->setMessage($exception->getMessage());
        }

        if (in_array($result->status, [
            PaymentStatus::STATUS_CANCELED,
            PaymentStatus::STATUS_EXPIRED,
            PaymentStatus::STATUS_FAILED,
        ])) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->setMessage(__('Payment failed!'));
        }

        if (! $result->isPaid()) {
            return $response
                ->setError()
                ->setNextUrl(PaymentHelper::getCancelURL())
                ->setMessage(__('Error when processing payment via :paymentType!', ['paymentType' => 'Mollie']));
        }

        $status = PaymentStatusEnum::COMPLETED;

        if (in_array($result->status, [PaymentStatus::STATUS_OPEN, PaymentStatus::STATUS_AUTHORIZED])) {
            $status = PaymentStatusEnum::PENDING;
        }

        $orderIds = (array)$result->metadata->order_id;

        do_action(PAYMENT_ACTION_PAYMENT_PROCESSED, [
            'amount' => $request->input('amount'),
            'currency' => $result->amount->currency,
            'charge_id' => $result->id,
            'payment_channel' => MOLLIE_PAYMENT_METHOD_NAME,
            'status' => $status,
            'customer_id' => $request->input('customer_id'),
            'customer_type' => $request->input('customer_type'),
            'payment_type' => 'direct',
            'order_id' => $orderIds,
        ]);

        return $response
            ->setNextUrl(PaymentHelper::getRedirectURL())
            ->setMessage(__('Checkout successfully!'));
    }
}
