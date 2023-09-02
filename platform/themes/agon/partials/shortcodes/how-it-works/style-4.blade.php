<section class="section-box mt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-sm-1 col-12"></div>
            <div class="col-lg-10 col-sm-10 col-12 text-center">
                <div class="text-center mb-20">
                    <span class="tag-1">{!! BaseHelper::clean($shortcode->title) !!}</span>
                </div>
                <h2 class="text-display-3 color-gray-900 mb-60">{!! BaseHelper::clean($shortcode->subtitle) !!}</h2>
            </div>
            <div class="col-lg-1 col-sm-1 col-12"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-sm-12 col-12"></div>
            <div class="col-lg-10 col-sm-12 col-12">
                <ul class="list-steps">
                    @foreach (collect($tabs)->chunk(3) as $items)
                        @foreach ($loop->iteration % 2 == 0 ? collect($items)->reverse() : $items as $tab)
                            @php
                                $key = $loop->iteration + ($loop->parent->index * 3)
                            @endphp
                            <li class="icon-asset{{ $loop->last && $loop->parent->last ? '' : $key }} wow animate__animated animate__fadeIn"
                                    data-wow-delay=".{{ $key * 2 - 1 }}s">
                                <div class="text-center block-step" @if (Arr::get($tab, 'bg_color')) style="background-color: {{ Arr::get($tab, 'bg_color') }};" @endif>
                                    <div class="mb-30">
                                        <img src="{{ RvMedia::getImageUrl(Arr::get($tab, 'image'), null, false, RvMedia::getDefaultImage()) }}" alt="{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}">
                                    </div>
                                    <h3 class="text-heading-5 mb-10">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</h3>
                                    <p class="text-body-text color-gray-500">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-1 col-sm-12 col-12"></div>
        </div>
    </div>
</section>
