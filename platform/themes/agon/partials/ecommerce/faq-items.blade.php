<div class="accordion faq-list-items" id="faqs-accordion">
    @foreach($product->faq_items as $faq)
        <div class="accordion-item faq-item">
            <h2 class="accordion-header" id="heading-product-{{ $loop->iteration }}">
                <button class="accordion-button text-heading-5 @if (!$loop->first) collapsed @endif"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-product-{{ $loop->iteration }}"
                    @if ($loop->first) aria-expanded="true" @else aria-expanded="false" @endif
                    aria-controls="collapse-product-{{ $loop->iteration }}">
                    <span class="faq-question">{!! BaseHelper::clean($faq[0]['value']) !!}</span>
                </button>
            </h2>
            <div class="accordion-collapse collapse @if ($loop->first) show @endif"
                id="collapse-product-{{ $loop->iteration }}" aria-labelledby="heading-product-{{ $loop->iteration }}"
                data-bs-parent="#faqs-accordion">
                <div class="accordion-body faq-answer">{!! BaseHelper::clean($faq[1]['value']) !!}</div>
            </div>
        </div>
    @endforeach
</div>
