        </main>
        @if(! empty(dynamic_sidebar('pre_footer_sidebar')))
            <div class="container">
                <div class="row">
                    {!! dynamic_sidebar('pre_footer_sidebar') !!}
                </div>
            </div>
        @endif
        <footer class="footer mt-40">
            <div class="container">
                <div class="footer-top"></div>
                <div class="row">
                    {!! dynamic_sidebar('footer_sidebar') !!}
                </div>
                <div class="footer-bottom mt-20">
                    <div class="row">
                        <div class="col-md-8">
                            <span class="color-gray-500 text-body-lead">{!! BaseHelper::clean(theme_option('copyright')) !!}</span>
                            {!! Menu::renderMenuLocation('footer-bottom-menu', [
                                    'view'    => 'footer-menu',
                                    'options' => ['class' => 'menu-footer color-gray-400'],
                            ]) !!}
                        </div>
                        @if (theme_option('social_links') && ($socialLinks = json_decode(theme_option('social_links'), true)))
                            @if(Arr::get($socialLinks, '0.0.value'))
                                <div class="col-md-4 text-center text-lg-end text-md-end">
                                    <div class="footer-social">
                                        @foreach($socialLinks as $socialLink)
                                            @if (count($socialLink) == 3)
                                                <a
                                                    class="icon-socials"
                                                    style="background: url({{ RvMedia::getImageUrl(Arr::get($socialLink[1], 'value')) }}) no-repeat 0 0;"
                                                    href="{{ Arr::get($socialLink[2], 'value') }}" target="_blank"
                                                    title="{{ Arr::get($socialLink[0], 'value') }}"
                                                ></a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </footer>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1111;">
            <div id="live-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <span class="success text-success">
                        <span class="d-flex">
                            <i class="fi fi-rr-check d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Success') }}</strong>
                        </span>
                    </span>
                    <span class="danger text-danger">
                        <span class="d-flex">
                            <i class="fi fi-rr-cross-circle d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Error') }}</strong>
                        </span>
                    </span>
                    <span class="info text-info">
                        <span class="d-flex">
                            <i class="fi fi-rr-info d-flex align-items-center me-2"></i>
                            <strong class="me-auto">{{ __('Info') }}</strong>
                        </span>
                    </span>
                    <strong class="me-auto"></strong>
                    <small class="time"></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body"></div>
            </div>
        </div>

        @if (is_plugin_active('ecommerce'))
            {!! Theme::partial('ecommerce.quick-view-modal') !!}

            <div class="offcanvas offcanvas-end" tabindex="-1" id="shop-cart-offcanvas" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel" class="title-question">{{ __('Your Cart') }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mini-cart-content"></div>
                </div>
            </div>

            <div class="hidden">
                <div id="btn-view-more-wishlist">
                    <a href="{{ route('public.wishlist') }}">{{ __('View more') }}</a>
                </div>

                <div id="btn-view-more-compare">
                    <a href="{{ route('public.compare') }}">{{ __('View more') }}</a>
                </div>
            </div>
        @endif

        <div id="scrollUp"><i class="fi-rr-arrow-small-up"></i></div>

        <script>
            'use strict';

            window.trans = {
                "View All": "{{ __('View All') }}",
                "No reviews!": "{{ __('No reviews!') }}",
                "days": "{{ __('days') }}",
                "hours": "{{ __('hours') }}",
                "mins": "{{ __('mins') }}",
                "sec": "{{ __('sec') }}",
            };

            window.siteConfig = {
                "url" : "{{ route('public.index') }}",
            };

            @if (is_plugin_active('ecommerce') && EcommerceHelper::isCartEnabled())
                siteConfig.ajaxCart = "{{ route('public.ajax.cart') }}";
                siteConfig.cartUrl = "{{ route('public.cart') }}";
                siteConfig.wishlistUrl = "{{ route('public.wishlist') }}";
            @endif
        </script>

        {!! Theme::footer() !!}

        @if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
            <script type="text/javascript">
                window.noticeMessages = window.noticeMessages || [];
                @if (session()->has('success_msg'))
                    window.noticeMessages.push({
                        message: '{{ session('success_msg') }}'
                    });
                @endif

                @if (session()->has('error_msg'))
                    window.noticeMessages.push({
                        type: 'error',
                        message: '{{ session('error_msg') }}'
                    });
                @endif

                @if (isset($error_msg))
                    window.noticeMessages.push({
                        type: 'error',
                        message: '{{ $error_msg }}'
                    });
                @endif

                @if (isset($errors))
                    @foreach ($errors->all() as $error)
                        window.noticeMessages.push({
                            type: 'error',
                            message: '{!! BaseHelper::clean($error) !!}'
                        });
                    @endforeach
                @endif
            </script>
        @endif



        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function(){
                $(".owl-carousel.main-slider").owlCarousel({
                    rtl:true,
                    loop:true,
                    margin:10,
                    nav:false,
                    dots:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                })
            }); 
            $(document).ready(function(){
                $(".owl-carousel.gallery-slider").owlCarousel({
                    rtl:true,
                    loop:true,
                    margin:10,
                    nav:true,
                    dots:false,
                    responsive:{
                        0:{
                            items:5
                        },
                        600:{
                            items:5
                        },
                        1000:{
                            items:5
                        }
                    }
                })
                $(".owl-carousel.featured-product").owlCarousel({
                    rtl:true,
                    loop:true,
                    margin:20,
                    nav:true,
                    dots:false,
                   
                    responsive:{
                        0:{
                            margin:10,
                            items:1,
                            autoplay:true,
                            autoplayTimeout:1000,
                            autoplayHoverPause:true,
                            nav:false,
                        },
                        400:{
                            margin:10,
                            items:1,
                            autoplay:true,
                            autoplayTimeout:1000,
                            autoplayHoverPause:true,
                            nav:false,
                        },
                        600:{
                            margin:10,
                            items:2
                        },
                        1000:{
                            items:4
                        }
                    }
                })
                $(".owl-carousel.our-team").owlCarousel({
                    rtl:true,
                    loop:true,
                    margin:20,
                    nav:true,
                    dots:false,
                    responsive:{
                        0:{
                            items:1,
                            autoplay:true,
                            autoplayTimeout:1000,
                            autoplayHoverPause:true,
                            nav:false,
                        },
                        400:{
                            items:2,
                            autoplay:true,
                            autoplayTimeout:1000,
                            autoplayHoverPause:true,
                            nav:false,
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:4
                        }
                    }
                })
                var productPrice = $("#product-price");
                var productDescount = $(".price-old");
                var arrayProductPrice = productPrice.text().split(" ");
                var arrayProductDescount = productDescount.text().split(" ");
                if(productPrice && productDescount){
                    let firstSpan = document.createElement('span');
                    let secoundSpan = document.createElement('span');
                    let thirdSpan = document.createElement('span');
                    let forthSpan = document.createElement('span');
    
                    document.getElementById("product-price").innerHTML = ``;
                    document.querySelector(".price-old").innerHTML = ``;
                    
                    if (parseInt(arrayProductPrice[0])) {
                        firstSpan.append(arrayProductPrice[0]);
                        thirdSpan.append(arrayProductDescount[0]);
                        secoundSpan.classList.add('currancySpan')
                        forthSpan.classList.add('currancySpan')
                        secoundSpan.append(arrayProductPrice[1]);
                        forthSpan.append(arrayProductDescount[1]);
                    } else {
                        firstSpan.classList.add('currancySpan')
                        thirdSpan.classList.add('currancySpan')
                        firstSpan.append(arrayProductPrice[0]);
                        thirdSpan.append(arrayProductDescount[0]);
                        secoundSpan.append(arrayProductPrice[1]);
                        forthSpan.append(arrayProductDescount[1]);
                    }
                    document.getElementById("product-price").appendChild(firstSpan);
                    document.getElementById("product-price").appendChild(secoundSpan);
                    document.querySelector(".price-old").appendChild(thirdSpan);
                    document.querySelector(".price-old").appendChild(forthSpan);
                }
            }); 
        </script>
    </body>
</html>
