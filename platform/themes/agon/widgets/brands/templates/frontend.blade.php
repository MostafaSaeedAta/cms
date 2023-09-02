@if (is_plugin_active('ecommerce'))
    @php
        $numberOfDisplays = (int) Arr::get($config, 'number_of_display');
        $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], [], ['products']);
        $brands = $brands->take($numberOfDisplays);

        $rand = mt_rand();
    @endphp
    @if ($brands->count() > 0)

        <div class="single-widget mb-4">
            <h3 class="widget-header">{{ __('brands') }}</h3>
            <div class="tags">

                @foreach ($brands as $brand)
                    <a href="#" class="single-word">
                        <div class="icon">
                            <i class="fi fi-rr-cross"></i>
                        </div>
                        <div class="word">
                            {{ $brand->name }}
                        </div>
                    </a>
                @endforeach
                {{-- <a href="#" class="single-word">
                <div class="icon">
                    <i class="fi fi-rr-cross"></i>
                </div>
                <div class="word">
                    حقائب
                </div>
            </a>
            <a href="#" class="single-word">
                <div class="icon">
                    <i class="fi fi-rr-cross"></i>
                </div>
                <div class="word">
                    إلكترونيات
                </div>
            </a>
            <a href="#" class="single-word">
                <div class="icon">
                    <i class="fi fi-rr-cross"></i>
                </div>
                <div class="word">
                    إكسسوارات
                </div>
            </a>
            <a href="#" class="single-word">
                <div class="icon">
                    <i class="fi fi-rr-cross"></i>
                </div>
                <div class="word">
                    التعلم والمعرفة
                </div>
            </a> --}}
            </div>
        </div>
    @endif

@endif
