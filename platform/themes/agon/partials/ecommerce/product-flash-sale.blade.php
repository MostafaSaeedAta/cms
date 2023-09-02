@if ($flashSale = $product->latestFlashSales()->first())
    <div class="box-countdown mt-40 customed">
        <div class="box-processbar">
            <div class="text-hurry">{{ __('Hurry up!') }}<br>{{ __('Sales ends soon!') }}</div>
            <div class="process-bar-line">
                <div class="process-bar-inner" style="width: {{ $flashSale->pivot->quantity > 0 ? ($flashSale->pivot->sold / $flashSale->pivot->quantity) * 100 : 0 }}%;"></div>
            </div>
            <span class="text-number-sold">{{ __(':sold/:quantity sold', ['sold' => $flashSale->pivot->sold, 'quantity' => $flashSale->pivot->quantity]) }}</span>
        </div>
        <div class="box-count">
            <div class="deals-countdown pl-5" data-countdown="{{ BaseHelper::formatDate($flashSale->end_date, 'Y/m/d H:i:s') }}"></div>
        </div>
    </div>
@endif
