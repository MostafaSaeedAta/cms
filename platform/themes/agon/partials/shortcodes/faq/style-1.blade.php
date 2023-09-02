<div>
    @if ($shortcode->title || $shortcode->subtitle)
        <section class="section-box mt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-sm-1 col-12"></div>
                    <div class="col-lg-8 col-sm-10 col-12 text-center">
                        <h2 class="text-heading-1 color-gray-900">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                        <p class="text-body-lead-large color-gray-600 mt-20">
                            {!! BaseHelper::clean($shortcode->subtitle) !!}
                        </p>
                    </div>
                    <div class="col-lg-2 col-sm-1 col-12"></div>
                </div>
            </div>
        </section>
    @endif
    <section class="section-box mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <ul class="list-icons-2 faq-list-items">
                        @foreach($faqs as $faq)
                            <li class="faq-item">
                                <h3 class="text-heading-5 mb-10 faq-question">{{ $faq->question }}</h3>
                                <div class="text-body-text color-gray-500 faq-answer">
                                    <div>
                                        {!! BaseHelper::clean($faq->answer) !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
