<section class="section-box mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="pb-20 text-mb-center">
                    <div class="row">
                        @foreach ($tabs as $tab)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-30 text-center">
                                <span class="text-display-3 color-green-900">
                                    <span class="count">{{ Arr::get($tab, 'count') }}</span>{{ Arr::get($tab, 'extra') }}</span>
                                <div class="text-body-quote">{!! BaseHelper::clean(Arr::get($tab, 'title')) !!}</div>
                                <p class="text-body-text color-gray-500 mt-10">{!! BaseHelper::clean(Arr::get($tab, 'subtitle')) !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</section>
