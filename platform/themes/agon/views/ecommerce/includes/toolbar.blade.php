<div class="filters-products d-flex">
    <div class="number-info">
        <strong class="text-body color-gray-500 products-found">
            <span class="color-green-900 me-1 d-inline-block">{{ $products->total() }}</span> <span class="d-inline-block">{{ __('product(s) found') }}</span>
        </strong>
    </div>
    <div class="filter-info text-end">
        @if ($sortParams = EcommerceHelper::getSortParams())
            @php
                $sortBy = request()->input('sort-by');
                if ($sortBy && Arr::has($sortParams, $sortBy)) {
                    $sortByLabel = Arr::get($sortParams, $sortBy);
                } else {
                    $sortByLabel = Arr::first($sortParams);
                    $sortBy = array_key_first($sortParams);
                }
            @endphp
            <div class="icon-sort text-body color-gray-500 catalog-toolbar__ordering">
                <input type="hidden" name="sort-by" value="{{ $sortBy }}">

                <span class="d-inline-block">{{ __('Sort by') }}: </span>
                <div class="color-green-900 d-inline-block">
                    <div class="dropdown dropdown-sort">
                        <a class="btn dropdown-toggle" id="dropdownSort"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-display="static" href="#">
                            <span>{{ $sortByLabel }}</span>
                            <i class="fi-rr-angle-small-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                            @foreach ($sortParams as $key => $name)
                                <li>
                                    <a class="dropdown-item @if ($sortBy == $key) active @endif"
                                        href="#" data-value="{{ $key }}">{{ $name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
