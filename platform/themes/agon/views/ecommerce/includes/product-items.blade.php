<div class="loading loading-container">
    <div class="half-circle-spinner">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>
</div>
<!--products list-->
<input type="hidden" name="page" data-value="{{ $products->currentPage() }}">
<input type="hidden" name="q" value="{{ BaseHelper::stringify(request()->query('q')) }}">
@php
    $with = ['categories'];
    if (is_plugin_active('language-advanced') && Language::getCurrentLocaleCode() != Language::getDefaultLocaleCode()) {
        $with[] = 'categories.translations';
    }
    $products->loadMissing($with);
    $classes = request()->input('layout') == 'grid-2' ? 'row-cols-xl-3 row-cols-lg-2' : 'row-cols-xl-4 row-cols-lg-3';
@endphp
<div class="row mt-40 {{ $classes }} row-cols-md-2 row-cols-sm-2">
    @forelse ($products as $product)
        <div class="col">
            {!! Theme::partial('ecommerce.product-item', compact('product')) !!}
        </div>
    @empty
        <div class="col-12 w-100">
            <div class="alert alert-warning mt-4 w-100" role="alert">
                {{ __(':total Product(s) found', ['total' => 0]) }}
            </div>
        </div>
    @endforelse
</div>

{!! $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) !!}
