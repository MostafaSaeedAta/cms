<div>
    <h4 class="mb-30 title-question">{{ __('Customer reviews') }}</h4>
    <div class="d-flex mb-30">
        <div class="product-rate d-inline-block mr-15">
            <div class="product-rating" style="width: {{ $product->reviews_avg * 20 }}%"></div>
        </div>
        <h6>{{ __(':avg out of :total', ['avg' => number_format($product->reviews_avg, 2), 'total' => 5]) }}</h6>
    </div>
    @foreach (EcommerceHelper::getReviewsGroupedByProductId($product->id, $product->reviews_count) as $item)
        <div class="progress">
            <span>{{ __(':number star', ['number' => $item['star']]) }}</span>
            <div class="progress-bar" role="progressbar" style="width: {{ $item['percent'] }}%"
                aria-valuenow="{{ $item['percent'] }}" aria-valuemin="0" aria-valuemax="100">{{ $item['percent'] }}%</div>
        </div>
    @endforeach
</div>
