'use strict';

let MartApp = MartApp || {};
window.MartApp = MartApp;

MartApp.isRTL = $('body').prop('dir') === 'rtl';

(function ($) {

    MartApp.init = function () {
        MartApp.$body = $(document.body);

        MartApp.$formSearch = $('#products-filter-form');
        MartApp.productListing = '.products-listing';
        MartApp.$productListing = $(MartApp.productListing);
        MartApp.shopCart = document.getElementById('shop-cart-offcanvas');
        MartApp.$shopCart = new bootstrap.Offcanvas(MartApp.shopCart);
        MartApp.$quickViewModal = $('#product-quick-view-modal');

        this.productQuickView();
        this.productQuantity();
        this.addProductToWishlist();
        this.addProductToCompare();
        this.addProductToCart();
        this.applyCouponCode();
        this.filterSlider();
        this.handleTabBootstrap();
        this.toggleViewProducts();
        this.toolbarOrderingProducts();
        this.productsFilter();
        this.searchProducts();
        this.ajaxUpdateCart();
        this.removeCartItem();
        this.removeWishlistItem();
        this.removeCompareItem();
        this.submitReviewProduct();
        this.customerDashboard();
        this.stickyAddToCart();
        this.recentlyViewedProducts();
        this.lightBox();
        this.productGallery();

        MartApp.$body.on('click', '.sidebar-filter-mobile', function (e) {
            e.preventDefault();
            MartApp.toggleSidebarFilterProducts('open', $(e.currentTarget).data('toggle'));
        });

        MartApp.$body.on('submit', '.products-filter-form-vendor', function (e) {
            if (MartApp.$formSearch.length) {
                MartApp.$formSearch.trigger('submit');
                return false;
            }
            return true;
        });
    };

    MartApp.toggleSidebarFilterProducts = function (status = 'close', target = 'product-categories-primary-sidebar') {
        const $el = $('[data-toggle-target="' + target + '"]');
        if (status === 'close') {
            $el.removeClass('active');
            _scrollBar.reset();
        } else {
            $el.addClass('active');
            _scrollBar.hide();
        }
    }

    MartApp.productQuickView = function () {

        MartApp.$body.on(
            'click',
            '.box-quick-view .product-quick-view-button',
            function (e) {
                e.preventDefault();
                const _self = $(e.currentTarget);
                $.ajax({
                    url: _self.data('url'),
                    type: 'GET',
                    beforeSend: () => {
                        _self.addClass('button-loading');
                        MartApp.$quickViewModal.removeClass('loaded').addClass('loading');
                        MartApp.$quickViewModal.modal('show');
                        MartApp.$quickViewModal.find('.product-modal-content').addClass('cotnent-loading').html('');
                    },
                    success: res => {
                        if (!res.error) {
                            MartApp.$quickViewModal
                                .find('.product-modal-content')
                                .html(res.data);
                        }
                    },
                    error: res => {
                        AgonApp.handleError(res);
                    },
                    complete: () => {
                        MartApp.$quickViewModal.addClass('loaded').removeClass('loading');
                        MartApp.$quickViewModal.find('.product-modal-content').removeClass('cotnent-loading');
                        _self.removeClass('button-loading');
                    },
                });
            }
        );
    };

    MartApp.productGallery = function (destroy, $gallery) {
        if (!$gallery || !$gallery.length) {
            $gallery = $('.product-image-slider');
        }

        const nav = $gallery.data('nav');

        if ($gallery.length && destroy) {
            if ($gallery.hasClass('slick-initialized')) {
                $gallery.slick('unslick');
            }
            if ($(nav).length && $(nav).hasClass('slick-initialized')) {
                $(nav).slick('unslick');
            }
        }

        $gallery.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: nav,
            rtl: MartApp.isRTL
        });

        let options = {
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: $gallery.data('main'),
            dots: false,
            focusOnSelect: true,
            vertical: true,
            prevArrow:
                '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
            nextArrow:
                '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false,
                        adaptiveHeight: true
                    }
                }
            ],
            rtl: MartApp.isRTL
        };

        $(nav).slick(options);
    };

    MartApp.productQuantity = function () {
        MartApp.$body.on(
            'click',
            '.quantity .increase, .quantity .decrease',
            function (e) {
                e.preventDefault();
                let $this = $(this),
                    $wrapperBtn = $this.closest('.product-button'),
                    $btn = $wrapperBtn.find('.quantity_button'),
                    $price = $this
                        .closest('.quantity')
                        .siblings('.box-price')
                        .find('.price-current'),
                    $priceCurrent = $price.html(),
                    $qty = $this.siblings('.qty'),
                    step = parseInt($qty.attr('step'), 10),
                    current = parseInt($qty.val(), 10),
                    min = parseInt($qty.attr('min'), 10),
                    max = parseInt($qty.attr('max'), 10);
                min = min || 1;
                max = max || current + 1;
                if ($this.hasClass('decrease') && current > min) {
                    $qty.val(current - step);
                    $qty.trigger('change');
                    let numQuantity = +$btn.attr('data-quantity');
                    numQuantity = numQuantity - 1;
                    $btn.attr('data-quantity', numQuantity);
                    let $total2 = (
                        $priceCurrent * 1 -
                        $priceCurrent / current
                    ).toFixed(2);
                    $price.html($total2);
                }
                if ($this.hasClass('increase') && current < max) {
                    $qty.val(current + step);
                    $qty.trigger('change');
                    let numQuantity = +$btn.attr('data-quantity');
                    numQuantity = numQuantity + 1;
                    $btn.attr('data-quantity', numQuantity);
                    let $total = (
                        $priceCurrent * 1 +
                        $priceCurrent / current
                    ).toFixed(2);
                    $price.html($total);
                }

                MartApp.processUpdateCart($this);
            }
        );
        MartApp.$body.on('keyup', '.quantity .qty', function (e) {
            e.preventDefault();
            let $this = $(this),
                $wrapperBtn = $this.closest('.product-button'),
                $btn = $wrapperBtn.find('.quantity_button'),
                $price = $this
                    .closest('.quantity')
                    .siblings('.box-price')
                    .find('.price-current'),
                $priceFirst = $price.data('current'),
                current = parseInt($this.val(), 10),
                min = parseInt($this.attr('min'), 10),
                max = parseInt($this.attr('max'), 10);
            let min_check = min ? min : 1;
            let max_check = max ? max : current + 1;
            if (current <= max_check && current >= min_check) {
                $btn.attr('data-quantity', current);
                let $total = ($priceFirst * current).toFixed(2);
                $price.html($total);
            }

            MartApp.processUpdateCart($this);
        });
    };

    MartApp.addProductToWishlist = function () {
        MartApp.$body.on('click', '.product-wishlist-button', function (e) {
            e.preventDefault();
            const $btn = $(e.currentTarget);
            const $btnViewMore = $('#btn-view-more-wishlist').html();

            $.ajax({
                url: $btn.data('url'),
                method: 'POST',
                beforeSend: () => {
                    $btn.addClass('button-loading');
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                        return false;
                    }

                    AgonApp.showSuccess(res.message + $btnViewMore);
                    $('.btn-wishlist .header-item-counter').text(res.data.count);
                    if (res.data?.added) {
                        $(
                            '.wishlist-button .wishlist[data-url="' + $btn.data('url') + '"]'
                        ).addClass('added-to-wishlist');
                    } else {
                        $(
                            '.wishlist-button .wishlist[data-url="' + $btn.data('url') + '"]'
                        ).removeClass('added-to-wishlist');
                    }
                },
                error: res => {
                    AgonApp.showError(res.message);
                },
                complete: () => {
                    $btn.removeClass('button-loading');
                },
            });
        });
    };

    MartApp.addProductToCompare = function () {
        MartApp.$body.on('click', '.product-compare-button', function (e) {
            e.preventDefault();
            const $btn = $(e.currentTarget);
            const $btnViewMore = $('#btn-view-more-compare').html();

            $.ajax({
                url: $btn.data('url'),
                method: 'POST',
                beforeSend: () => {
                    $btn.addClass('button-loading');
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                        return false;
                    }
                    AgonApp.showSuccess(res.message + $btnViewMore);
                    $('.btn-compare .header-item-counter').text(res.data.count);
                },
                error: res => {
                    AgonApp.showError(res.message);
                },
                complete: () => {
                    $btn.removeClass('button-loading');
                },
            });
        });
    };

    MartApp.addProductToCart = function () {
        MartApp.$body.on('click', 'form.cart-form button[type=submit]', function (e) {
            e.preventDefault();
            const $form = $(this).closest('form.cart-form');
            const $btn = $(this);

            $.ajax({
                type: 'POST',
                url: $form.prop('action'),
                data: $form.serialize(),
                beforeSend: () => {
                    $btn.addClass('button-loading');
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                        return false;
                    }

                    if (
                        $btn.prop('name') === 'checkout' &&
                        res.data.next_url !== undefined
                    ) {
                        window.location.href = res.data.next_url;
                    } else {
                        MartApp.$shopCart.show();
                        MartApp.loadAjaxCart();
                    }
                },
                error: res => {
                    AgonApp.handleError(res, $form);
                },
                complete: () => {
                    $btn.removeClass('button-loading');
                },
            });
        });
    };

    MartApp.applyCouponCode = function () {
        $(document).on('keypress', '.form-coupon-wrapper .coupon-code', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                e.stopPropagation();
                $(e.currentTarget).closest('.form-coupon-wrapper').find('.btn-apply-coupon-code').trigger('click');
                return false;
            }
        });

        $(document).on('click', '.btn-apply-coupon-code', e => {
            e.preventDefault();
            let _self = $(e.currentTarget);

            $.ajax({
                url: _self.data('url'),
                type: 'POST',
                data: {
                    coupon_code: _self.closest('.form-coupon-wrapper').find('.coupon-code').val(),
                },
                beforeSend: () => {
                    _self.prop('disabled', true).addClass('loading');
                },
                success: res => {
                    if (!res.error) {
                        $('.cart-page-content').load(window.location.href + '?applied_coupon=1 .cart-page-content > *', function () {
                            _self.prop('disabled', false).removeClass('loading');
                            AgonApp.showSuccess(res.message);
                        });
                    } else {
                        AgonApp.showError(res.message);
                    }
                },
                error: data => {
                    AgonApp.handleError(data);
                },
                complete: res => {
                    if (!(res.status == 200 && res?.responseJSON?.error == false)) {
                        _self.prop('disabled', false).removeClass('loading');
                    }
                }
            });
        });

        $(document).on('click', '.btn-remove-coupon-code', e => {
            e.preventDefault();
            const _self = $(e.currentTarget);
            const buttonText = _self.text();
            _self.text(_self.data('processing-text'));

            $.ajax({
                url: _self.data('url'),
                type: 'POST',
                success: res => {
                    if (!res.error) {
                        $('.cart-page-content').load(window.location.href + ' .cart-page-content > *', function () {
                            _self.text(buttonText);
                        });
                    } else {
                        AgonApp.showError(res.message);
                    }
                },
                error: data => {
                    AgonApp.handleError(data);
                },
                complete: res => {
                    if (!(res.status == 200 && res?.responseJSON?.error == false)) {
                        _self.text(buttonText);
                    }
                }
            });
        });
    }

    MartApp.loadAjaxCart = function () {
        if (window.siteConfig?.ajaxCart) {
            $.ajax({
                url: window.siteConfig.ajaxCart,
                method: 'GET',
                success: function (res) {
                    if (!res.error) {
                        $('.btn-shopping-cart .header-item-counter').text(res.data.count);
                        $('.cart--mini .cart-price-total .cart-amount span').text(res.data.total_price);
                        $('.menu--footer .icon-cart .cart-counter').text(res.data.count);
                        $('.header-top .header-cart-button .cart-count').text(res.data.count);
                        $(MartApp.shopCart).find('.mini-cart-content').html(res.data.html)
                    }
                },
            });
        }
    }

    MartApp.changeInputInSearchForm = function (parseParams) {
        isReadySubmitTrigger = false;
        MartApp.$formSearch
            .find('input, select, textarea')
            .each(function (e, i) {
                const $el = $(i);
                const name = $el.attr('name');
                let value = parseParams[name] || null;
                const type = $el.attr('type');
                switch (type) {
                    case 'checkbox':
                        $el.prop('checked', false);
                        if (Array.isArray(value)) {
                            $el.prop('checked', value.includes($el.val()));
                        } else {
                            $el.prop('checked', !!value);
                        }
                        break;
                    default:
                        if ($el.is('[name=max_price]')) {
                            $el.val(value || $el.data('max'));
                        } else if ($el.is('[name=min_price]')) {
                            $el.val(value || $el.data('min'));
                        } else if ($el.val() != value) {
                            $el.val(value);
                        }
                        break;
                }
            });
        isReadySubmitTrigger = true;
    };

    MartApp.convertFromDataToArray = function (formData) {
        let data = [];
        formData.forEach(function (obj) {
            if (obj.value) {
                // break with price
                if (['min_price', 'max_price'].includes(obj.name)) {
                    const dataValue = MartApp.$formSearch
                        .find('input[name=' + obj.name + ']')
                        .data(obj.name.substring(0, 3));
                    if (dataValue == parseInt(obj.value)) {
                        return;
                    }
                }
                data.push(obj);
            }
        });
        return data;
    };

    let isReadySubmitTrigger = true;

    MartApp.productsFilter = function () {
        MartApp.widgetProductCategories = '.widget-product-categories';
        MartApp.$widgetProductCategories = $(MartApp.widgetProductCategories);

        $(document).on('change', '#products-filter-form .product-filter-item', function () {
            if (isReadySubmitTrigger) {
                $(this).closest('form').trigger('submit');
            }
        });

        function openCategoryFilter($li) {
            if ($li.length) {
                $li.addClass('opened');
                if ($li.closest('ul').closest('li.category-filter').length) {
                    openCategoryFilter($li.closest('ul').closest('li.category-filter'));
                }
            }
        }

        const $categories = $('.widget-product-categories').find('li a.active');
        $categories.map(function (e, i) {
            const $parent = $(i).closest('li.category-filter').closest('ul').closest('li.category-filter');
            if ($parent.length) {
                openCategoryFilter($parent);
            }
        });

        $('.catalog-toolbar__ordering input[name=sort-by]').on('change', function (e) {
            MartApp.$formSearch.find('input[name=sort-by]').val($(e.currentTarget).val());
            MartApp.$formSearch.trigger('submit');
        });

        MartApp.$body.on('click', '.cat-menu-close', function (e) {
            e.preventDefault();
            $(this).closest('li').toggleClass('opened');
        });

        $(document).on('click', MartApp.widgetProductCategories + ' li a', function (e) {
            e.preventDefault();
            const $this = $(e.currentTarget);
            const actived = $this.hasClass('active');
            const $parent = $this.closest(MartApp.widgetProductCategories);
            $parent.find('li a').removeClass('active');
            $this.addClass('active');

            const $input = $parent.find("input[name='categories[]']");
            if ($input.length) {
                if (actived) {
                    $this.removeClass('active');
                    $input.val('');
                } else {
                    $input.val($this.data('id'));
                }
                $input.trigger('change');
            } else {
                let href = $this.attr('href');
                MartApp.$formSearch.attr('action', href).trigger('submit');
            }
        });

        $(document).on('submit', '#products-filter-form', function (e) {
            e.preventDefault();
            const $form = $(e.currentTarget);
            const formData = $form.serializeArray();
            let data = MartApp.convertFromDataToArray(formData);
            let uriData = [];

            // Paginate
            const $elPage = MartApp.$productListing.find('input[name=page]');
            if ($elPage.val()) {
                data.push({ name: 'page', value: $elPage.val() });
            }

            // Without "s" param
            data.map(function (obj) {
                uriData.push(encodeURIComponent(obj.name) + '=' + obj.value);
            });

            const nextHref =
                $form.attr('action') +
                (uriData && uriData.length ? '?' + uriData.join('&') : '');

            // add to params get to popstate not show json
            data.push({ name: '_', value: +new Date() });

            $.ajax({
                url: $form.attr('action'),
                type: 'GET',
                data: data,
                beforeSend: function () {
                    // Show loading before sending
                    MartApp.$productListing.addClass('content-loading');
                    // Animation scroll to filter button
                    $('html, body').animate({ scrollTop: MartApp.$productListing.offset().top - 200 }, 500);
                    // Change price step;
                    const priceStep = MartApp.$formSearch.find('.nonlinear');
                    if (priceStep.length) {
                        priceStep[0].noUiSlider.set([
                            MartApp.$formSearch
                                .find('input[name=min_price]')
                                .val(),
                            MartApp.$formSearch
                                .find('input[name=max_price]')
                                .val(),
                        ]);
                    }
                    // MartApp.toggleSidebarFilterProducts();
                },
                success: function (res) {
                    if (res.error == false) {
                        MartApp.$productListing.html(res.data);

                        const total = res.message;
                        if (total && $('.products-found').length) {
                            $('.products-found').html('<span class="color-green-900 me-1">' + total.substr(0, total.indexOf(' ')) +
                                '</span>' + total.substr(total.indexOf(' ') + 1))
                        }

                        if (res.additional?.category_tree) {
                            $('.widget-product-categories .widget-layered-nav-list').html(res.additional?.category_tree);
                        }

                        if (nextHref != window.location.href) {
                            window.history.pushState(
                                data,
                                res.message,
                                nextHref
                            );
                        }
                    } else {
                        AgonApp.showError(res.message || 'Opps!');
                    }
                },
                error: function (res) {
                    AgonApp.handleError(res);
                },
                complete: function () {
                    MartApp.$productListing.removeClass('content-loading');
                },
            });
        });

        window.addEventListener(
            'popstate',
            function () {
                let url = window.location.origin + window.location.pathname;
                if (MartApp.$formSearch.length) {
                    MartApp.$formSearch.attr('action', url);
                    const parseParams = MartApp.parseParamsSearch();
                    MartApp.changeInputInSearchForm(parseParams);
                    MartApp.$formSearch.trigger('submit');
                } else {
                    history.back();
                }
            },
            false
        );

        $(document).on(
            'click',
            MartApp.productListing + ' .paginations a',
            function (e) {
                e.preventDefault();
                let url = new URL($(e.currentTarget).attr('href'));
                let page = url.searchParams.get('page');
                MartApp.$productListing.find('input[name=page]').val(page);
                MartApp.$formSearch.trigger('submit');
            }
        );
    };

    MartApp.parseParamsSearch = function (query, includeArray = false) {
        let pairs = query || window.location.search.substring(1);
        let re = /([^&=]+)=?([^&]*)/g;
        let decodeRE = /\+/g;  // Regex for replacing addition symbol with a space
        let decode = function (str) {
            return decodeURIComponent(str.replace(decodeRE, " "));
        };
        let params = {}, e;
        while (e = re.exec(pairs)) {
            let k = decode(e[1]), v = decode(e[2]);
            if (k.substring(k.length - 2) == '[]') {
                if (includeArray) {
                    k = k.substring(0, k.length - 2);
                }
                (params[k] || (params[k] = [])).push(v);
            } else params[k] = v;
        }
        return params;
    }

    MartApp.searchProducts = function () {
        $('body').on('click', function (e) {
            if (!$(e.target).closest('.form--quick-search').length) {
                $('.panel--search-result').removeClass('active');
            }
        });

        let currentRequest = null;
        $('.form--quick-search .input-search-product')
            .on('keyup', function () {
                const $form = $(this).closest('form');
                ajaxSearchProduct($form);
            });

        $('.form--quick-search .product-category-select').on('change', function () {
            const $form = $(this).closest('form');
            ajaxSearchProduct($form);
        });

        $('.form--quick-search').on('click', '.loadmore', function (e) {
            e.preventDefault();
            const $form = $(this).closest('form');
            $(this).addClass('loading');
            ajaxSearchProduct($form, $(this).attr('href'));
        });

        function ajaxSearchProduct($form, url = null) {
            const $panel = $form.find('.panel--search-result');
            const k = $form.find('.input-search-product').val();
            if (!k) {
                $panel.html('').removeClass('active');
                return;
            }
            const $button = $form.find('button[type=submit]');

            currentRequest = $.ajax({
                type: 'GET',
                url: url || $form.data('ajax-url'),
                data: url ? [] : $form.serialize(),
                beforeSend: function () {
                    if (currentRequest != null) {
                        currentRequest.abort();
                    }

                    $button.addClass('loading');
                },
                success: res => {
                    if (!res.error) {
                        if (url) {
                            const $content = $('<div>' + res.data + '</div>');
                            $panel.find('.panel__content').find('.loadmore-container').remove();
                            $panel.find('.panel__content').append($content.find('.panel__content').contents());
                        } else {
                            $panel.html(res.data).addClass('active');
                        }
                    } else {
                        $panel.html('').removeClass('active');
                    }

                    $button.removeClass('loading');
                },
                error: () => {
                    $button.removeClass('loading');
                }
            });
        }
    }

    MartApp.processUpdateCart = function ($this) {
        const $form = $('.cart-page-content').find('.form--shopping-cart');

        if (!$form.length) {
            return false;
        }

        $.ajax({
            type: 'POST',
            cache: false,
            url: $form.prop('action'),
            data: new FormData($form[0]),
            contentType: false,
            processData: false,
            beforeSend: () => {
                $this.addClass('button-loading');
            },
            success: res => {
                if (res.error) {
                    AgonApp.showError(res.message);
                    return false;
                }

                $('.cart-page-content').load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () { });

                MartApp.loadAjaxCart();

                AgonApp.showSuccess(res.message);
            },
            error: res => {
                $this.closest('.ps-table--shopping-cart').removeClass('content-loading');
                AgonApp.showError(res.message);
            },
            complete: () => {
                $this.removeClass('button-loading');
            }
        });
    }

    MartApp.ajaxUpdateCart = function (_self) {
        $(document).on('click', '.cart-page-content .update_cart', function (e) {
            e.preventDefault();
            const $this = $(e.currentTarget);

            MartApp.processUpdateCart($this);
        });
    }

    MartApp.removeCartItem = function () {
        $(document).on('click', '.remove-cart-item', function (event) {
            event.preventDefault();
            let _self = $(this);

            let _item = _self.closest('.mini-cart-item');

            $.ajax({
                url: _self.data('url'),
                method: 'GET',
                beforeSend: () => {
                    _self.addClass('button-loading');
                    _item.fadeOut(1000);
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                        return false;
                    }

                    const $cartContent = $('.cart-page-content');

                    if ($cartContent.length && window.siteConfig?.cartUrl) {
                        $cartContent.load(window.siteConfig.cartUrl + ' .cart-page-content > *', function () { });
                    }

                    _item.remove();
                    MartApp.loadAjaxCart();
                },
                error: res => {
                    AgonApp.showError(res.message);
                    _item.fadeIn();
                },
                complete: () => {
                    _self.removeClass('button-loading');
                }
            });
        });
    }

    MartApp.removeWishlistItem = function () {
        $(document).on('click', '.remove-wishlist-item', function (event) {
            event.preventDefault();
            let _self = $(this);

            $.ajax({
                url: _self.data('url'),
                method: 'POST',
                data: {
                    _method: 'DELETE',
                },
                beforeSend: () => {
                    _self.addClass('button-loading');
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                    } else {
                        AgonApp.showSuccess(res.message);
                        $('.btn-wishlist .header-item-counter').text(res.data.count);
                        if (res.data.count === 0) {
                            $('.wishlist-page-content').load(window.siteConfig.wishlistUrl + ' .wishlist-page-content > *');
                        } else {
                            _self.closest('tr').remove();
                        }
                    }
                },
                error: res => {
                    AgonApp.showError(res.message);
                },
                complete: () => {
                    _self.removeClass('button-loading');
                }
            });
        });
    }

    MartApp.removeCompareItem = function () {
        $(document).on('click', '.remove-compare-item', function (event) {
            event.preventDefault();
            let _self = $(this);

            $.ajax({
                url: _self.data('url'),
                method: 'POST',
                data: {
                    _method: 'DELETE',
                },
                beforeSend: () => {
                    _self.addClass('button-loading');
                },
                success: res => {
                    if (res.error) {
                        AgonApp.showError(res.message);
                    } else {
                        AgonApp.showSuccess(res.message);
                        $('.btn-compare .header-item-counter').text(res.data.count);
                        $('.compare-page-content').load(window.location.href + ' .compare-page-content > *');
                    }
                },
                error: res => {
                    AgonApp.showError(res.message);
                },
                complete: () => {
                    _self.removeClass('button-loading');
                }
            });
        });
    }

    MartApp.handleTabBootstrap = function () {
        let hash = window.location.hash;
        if (hash) {
            let tabTriggerEl = $('a[href="' + hash + '"]');
            if (tabTriggerEl.length) {
                let tab = new bootstrap.Tab(tabTriggerEl[0]);
                tab.show();
            }
        }
    };

    MartApp.filterSlider = function () {
        $('.nonlinear').each(function (index, element) {
            let $element = $(element);
            let min = $element.data('min');
            let max = $element.data('max');
            let $wrapper = $(element).closest('.nonlinear-wrapper');
            noUiSlider.create(element, {
                connect: true,
                behaviour: 'tap',
                start: [
                    $wrapper.find('.product-filter-item-price-0').val(),
                    $wrapper.find('.product-filter-item-price-1').val(),
                ],
                range: {
                    min: min,
                    '10%': max * 0.1,
                    '20%': max * 0.2,
                    '30%': max * 0.3,
                    '40%': max * 0.4,
                    '50%': max * 0.5,
                    '60%': max * 0.6,
                    '70%': max * 0.7,
                    '80%': max * 0.8,
                    '90%': max * 0.9,
                    max: max,
                },
            });

            let nodes = [
                $wrapper.find('.slider__min'),
                $wrapper.find('.slider__max'),
            ];

            element.noUiSlider.on('update', function (values, handle) {
                nodes[handle].html(MartApp.numberFormat(values[handle]));
            });

            element.noUiSlider.on('change', function (values, handle) {
                $wrapper
                    .find('.product-filter-item-price-' + handle)
                    .val(Math.round(values[handle]))
                    .trigger('change');
            });
        });
    };

    MartApp.numberFormat = function (
        number,
        decimals,
        dec_point,
        thousands_sep
    ) {
        let n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = typeof thousands_sep === 'undefined' ? ',' : thousands_sep,
            dec = typeof dec_point === 'undefined' ? '.' : dec_point,
            toFixedFix = function (n, prec) {
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                let k = Math.pow(10, prec);
                return Math.round(n * k) / k;
            },
            s = (prec ? toFixedFix(n, prec) : Math.round(n))
                .toString()
                .split('.');

        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }

        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    };

    MartApp.submitReviewProduct = function () {
        let imagesReviewBuffer = [];
        let setImagesFormReview = function (input) {
            const dT = new ClipboardEvent('').clipboardData || // Firefox < 62 workaround exploiting https://bugzilla.mozilla.org/show_bug.cgi?id=1422655
                new DataTransfer(); // specs compliant (as of March 2018 only Chrome)
            for (let file of imagesReviewBuffer) {
                dT.items.add(file);
            }
            input.files = dT.files;
            loadPreviewImage(input);
        }

        let loadPreviewImage = function (input) {
            let $uploadText = $('.image-upload__text');
            const maxFiles = $(input).data('max-files');
            let filesAmount = input.files.length;

            if (maxFiles) {
                if (filesAmount >= maxFiles) {
                    $uploadText.closest('.image-upload__uploader-container').addClass('d-none');
                } else {
                    $uploadText.closest('.image-upload__uploader-container').removeClass('d-none');
                }
                $uploadText.text(filesAmount + '/' + maxFiles);
            } else {
                $uploadText.text(filesAmount);
            }
            const viewerList = $('.image-viewer__list');
            const $template = $('#review-image-template').html();

            viewerList.addClass('is-loading');
            viewerList.find('.image-viewer__item').remove();

            if (filesAmount) {
                for (let i = filesAmount - 1; i >= 0; i--) {
                    viewerList.prepend($template.replace('__id__', i));
                }
                for (let j = filesAmount - 1; j >= 0; j--) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        viewerList
                            .find('.image-viewer__item[data-id=' + j + ']')
                            .find('img')
                            .attr('src', event.target.result);
                    }
                    reader.readAsDataURL(input.files[j]);
                }
            }
            viewerList.removeClass('is-loading')
        }

        $(document).on('change', '.form-review-product input[type=file]', function (event) {
            event.preventDefault();
            let input = this;
            let $input = $(input);
            let maxSize = $input.data('max-size');
            Object.keys(input.files).map(function (i) {
                if (maxSize && (input.files[i].size / 1024) > maxSize) {
                    let message = $input.data('max-size-message')
                        .replace('__attribute__', input.files[i].name)
                        .replace('__max__', maxSize)
                    AgonApp.showError(message);
                } else {
                    imagesReviewBuffer.push(input.files[i]);
                }
            });

            let filesAmount = imagesReviewBuffer.length;
            const maxFiles = $input.data('max-files');
            if (maxFiles && filesAmount > maxFiles) {
                imagesReviewBuffer.splice(filesAmount - maxFiles - 1, filesAmount - maxFiles);
            }

            setImagesFormReview(input);
        });

        $(document).on('click', '.form-review-product .image-viewer__icon-remove', function (event) {
            event.preventDefault();
            const $this = $(event.currentTarget);
            let id = $this.closest('.image-viewer__item').data('id');
            imagesReviewBuffer.splice(id, 1);

            let input = $('.form-review-product input[type=file]')[0];
            setImagesFormReview(input);
        });

        if (sessionStorage.reloadReviewsTab) {
            if ($('#product-detail-tabs a[href="#product-reviews"]').length) {
                new bootstrap.Tab($('#product-detail-tabs a[href="#product-reviews"]')[0]).show()
            }
            sessionStorage.reloadReviewsTab = false;
        }

        $(document).on('click', '.form-review-product button[type=submit]', function (e) {
            e.preventDefault();
            e.stopPropagation();
            const $this = $(e.currentTarget);

            const $form = $(this).closest('form');
            $.ajax({
                type: 'POST',
                cache: false,
                url: $form.prop('action'),
                data: new FormData($form[0]),
                contentType: false,
                processData: false,
                beforeSend: () => {
                    $this.prop('disabled', true).addClass('loading');
                },
                success: res => {
                    if (!res.error) {
                        $form.find('select').val(0);
                        $form.find('textarea').val('');

                        AgonApp.showSuccess(res.message);

                        setTimeout(function () {
                            sessionStorage.reloadReviewsTab = true;
                            window.location.reload();
                        }, 1500);
                    } else {
                        AgonApp.showError(res.message);
                    }
                },
                error: res => {
                    AgonApp.handleError(res, $form);
                },
                complete: () => {
                    $this.prop('disabled', false).removeClass('loading');
                }
            });
        });

    }

    MartApp.customerDashboard = function () {
        if ($.fn.datepicker) {
            $('#date_of_birth').datepicker({
                format: 'yyyy-mm-dd',
                orientation: 'bottom'
            });
        }

        $('#avatar').on('change', event => {
            let input = event.currentTarget;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = e => {
                    $('.userpic-avatar')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });

        $(document).on('click', '.btn-trigger-delete-address', function (event) {
            event.preventDefault();
            $('.btn-confirm-delete').data('url', $(this).data('url'));
            $('#confirm-delete-modal').modal('show');
        });

        $(document).on('click', '.btn-confirm-delete', function (event) {
            event.preventDefault();
            let $current = $(this);
            $.ajax({
                url: $current.data('url'),
                type: 'GET',
                beforeSend: () => {
                    $current.addClass('loading');
                },
                success: res => {
                    $current.closest('.modal').modal('hide');
                    if (res.error) {
                        AgonApp.showError(res.message);
                    } else {
                        AgonApp.showSuccess(res.message);
                        $('.btn-trigger-delete-address[data-url="' + $current.data('url') + '"]').closest('.col').remove();
                    }
                },
                error: res => {
                    AgonApp.handleError(res);
                },
                complete: () => {
                    $current.removeClass('loading');
                },
            });
        });
    }

    MartApp.recentlyViewedProducts = function () {
        MartApp.$body.find('.header-recently-viewed').each(function () {
            const $el = $(this);
            let loading;
            $el.hover(function () {
                const $recently = $el.find('.recently-viewed-products');
                if ($el.data('loaded') || loading) {
                    return;
                }
                const url = $el.data('url');
                if (!url) {
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url,
                    beforeSend: () => {
                        loading = true;
                    },
                    success: res => {
                        if (!res.error) {
                            $recently.html(res.data);

                            if ($recently.find('.product-list li').length > 0) {
                                MartApp.slickSlide($recently.find('.product-list'));
                            }
                            $el.data('loaded', true).find('.loading--wrapper').addClass('d-none');
                        } else {
                            AgonApp.showError(res.message);
                        }
                    },
                    error: res => {
                        AgonApp.handleError(res);
                    },
                    complete: () => {
                        loading = false;
                    }
                });
            })
        });
    };

    MartApp.toggleViewProducts = function () {
        $(document).on('click', '.store-list-filter-button', function (e) {
            e.preventDefault();
            $('#store-listing-filter-form-wrap').toggle(500);
        });

        MartApp.$body.on('click', '.toolbar-view__icon a', function (e) {
            e.preventDefault();
            const $this = $(e.currentTarget);
            $this
                .closest('.toolbar-view__icon')
                .find('a')
                .removeClass('active');
            $this.addClass('active');
            $($this.data('target'))
                .removeClass($this.data('class-remove'))
                .addClass($this.data('class-add'));

            MartApp.$formSearch
                .find('input[name=layout]')
                .val($this.data('layout'));

            const params = new URLSearchParams(window.location.search);
            params.set('layout', $this.data('layout'));
            const nextHref = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + params.toString();
            if (nextHref != window.location.href) {
                window.history.pushState(
                    MartApp.$productListing.html(),
                    '',
                    nextHref
                );
            }
        });
    };

    MartApp.toolbarOrderingProducts = function () {
        MartApp.$body.on(
            'click',
            '.catalog-toolbar__ordering .dropdown .dropdown-menu a',
            function (e) {
                e.preventDefault();
                const $this = $(e.currentTarget);
                const $parent = $this.closest('.dropdown');
                $parent.find('li a').removeClass('active');
                $this.closest('li a').addClass('active');
                $parent.find('a[data-bs-toggle=dropdown] span').html($this.html());
                $this.closest('.catalog-toolbar__ordering').find('input[name=sort-by]').val($this.data('value')).trigger('change');
            }
        );
    };

    MartApp.lightBox = function () {

        let $galleries = $('.review-images-total.review-images');
        if ($galleries.length) {
            $galleries.map((index, value) => {
                if (!$(value).data('lightGallery')) {
                    $(value).lightGallery({
                        selector: 'a',
                        thumbnail: true,
                        share: false,
                        fullScreen: false,
                        autoplay: false,
                        autoplayControls: false,
                        actualSize: false,
                    });
                }
            });
        }
    }

    MartApp.stickyAddToCart = function () {
        let $headerProduct = $('.header--product');
        $(window).scroll(function () {
            let currentPosition = $(this).scrollTop();
            if (currentPosition > 50) {
                $headerProduct.addClass('header--sticky');
            } else {
                $headerProduct.removeClass('header--sticky');
            }
        });

        $('.header--product ul li > a ').on('click', function (e) {
            e.preventDefault();
            let target = $(this).attr('href');
            $(this)
                .closest('li')
                .siblings('li')
                .removeClass('active');
            $(this)
                .closest('li')
                .addClass('active');
            $(target)
                .closest('.product-detail-tabs')
                .find('a')
                .removeClass('active');

            $(target).addClass('active');
            $('.header--product ul li').removeClass('active');
            $('.header--product ul li a[href="' + target + '"]').closest('li').addClass('active');

            $('#product-detail-tabs-content > .tab-pane').removeClass('active show');
            $($(target).attr('href')).addClass('active show');

            $('html, body').animate(
                {
                    scrollTop: ($(target).offset().top - $('.header--product .navigation').height() - 165) + 'px',
                },
                0
            );
        });

        const $trigger = $('.product-details .entry-product-header'),
            $stickyBtn = $('.sticky-atc-wrap');

        if ($stickyBtn.length && $trigger.length && $(window).width() < 768) {
            let summaryOffset = $trigger.offset().top + $trigger.outerHeight(),
                _footer = $('.footer-mobile'),
                off_footer = 0,
                ck_footer = _footer.length > 0;

            const stickyAddToCartToggle = function () {
                let windowScroll = $(window).scrollTop(),
                    windowHeight = $(window).height(),
                    documentHeight = $(document).height();
                if (ck_footer) {
                    off_footer = _footer.offset().top - _footer.height();
                } else {
                    off_footer = windowScroll;
                }
                if (windowScroll + windowHeight === documentHeight || summaryOffset > windowScroll || windowScroll > off_footer) {
                    $stickyBtn.removeClass('sticky-atc-shown');
                } else if (summaryOffset < windowScroll && windowScroll + windowHeight !== documentHeight) {
                    $stickyBtn.addClass('sticky-atc-shown');
                }
            };

            stickyAddToCartToggle();

            $(window).scroll(stickyAddToCartToggle);
        }
    };

    $(function () {
        MartApp.init();

        window.onBeforeChangeSwatches = function (data, $attrs) {
            const $product = $attrs.closest('.product-details');
            const $form = $product.find('.cart-form');

            $product.find('.error-message').hide();
            $product.find('.success-message').hide();
            $product.find('.number-items-available').html('').hide();
            const $submit = $form.find('button[type=submit]');
            $submit.addClass('button-loading');

            if (data && data.attributes) {
                $submit.prop('disabled', true);
            }
        }

        window.onChangeSwatchesSuccess = function (res, $attrs) {
            const $product = $attrs.closest('.product-details');
            const $form = $product.find('.cart-form');
            const $footerCartForm = $('.footer-cart-form');
            $product.find('.error-message').hide();
            $product.find('.success-message').hide();

            if (res) {
                let $submit = $form.find('button[type=submit]');
                $submit.removeClass('button-loading');
                if (res.error) {
                    $submit.prop('disabled', true);
                    $product.find('.number-items-available').html('<span class="text-danger">(' + res.message + ')</span>').show();
                    $form.find('.hidden-product-id').val('');
                    $footerCartForm.find('.hidden-product-id').val('');
                } else {
                    const data = res.data;
                    const $price = $product.find('.box-price');
                    const $salePrice = $price.find('.price');
                    const $originalPrice = $price.find('.price-old');

                    if (data.sale_price !== data.price) {
                        $originalPrice.removeClass('d-none');
                    } else {
                        $originalPrice.addClass('d-none');
                    }

                    $salePrice.text(data.display_sale_price);
                    $originalPrice.text(data.display_price);

                    if (data.sku) {
                        $product.find('.meta-sku .meta-value').text(data.sku);
                        $product.find('.meta-sku').removeClass('d-none');
                    } else {
                        $product.find('.meta-sku').addClass('d-none');
                    }

                    $form.find('.hidden-product-id').val(data.id);
                    $footerCartForm.find('.hidden-product-id').val(data.id);
                    $submit.prop('disabled', false);

                    if (data.error_message) {
                        $submit.prop('disabled', true);
                        $product.find('.number-items-available').html('<span class="text-danger">(' + data.error_message + ')</span>').show();
                    } else if (data.success_message) {
                        $product.find('.number-items-available').html(res.data.stock_status_html).show();
                    } else {
                        $product.find('.number-items-available').html('').hide();
                    }

                    const unavailableAttributeIds = data.unavailable_attribute_ids || [];
                    $product.find('.attribute-swatch-item').removeClass('pe-none');
                    $product.find('.product-filter-item option').prop('disabled', false);
                    if (unavailableAttributeIds && unavailableAttributeIds.length) {
                        unavailableAttributeIds.map(function (id) {
                            let $item = $product.find('.attribute-swatch-item[data-id="' + id + '"]');
                            if ($item.length) {
                                $item.addClass('pe-none');
                                $item.find('input').prop('checked', false);
                            } else {
                                $item = $product.find('.product-filter-item option[data-id="' + id + '"]');
                                if ($item.length) {
                                    $item.prop('disabled', 'disabled').prop('selected', false);
                                }
                            }
                        });
                    }

                    const $gallery = $product.find('.galleries');
                    if ($gallery.length) {
                        if (!data.image_with_sizes.origin.length) {
                            data.image_with_sizes.origin.push(siteConfig.default_image);
                        }
                        if (!data.image_with_sizes.thumb.length) {
                            data.image_with_sizes.thumb.push(siteConfig.img_placeholder);
                        }

                        let imageHtml = '';
                        data.image_with_sizes.origin.forEach(function (item) {
                            imageHtml += `<figure class="border-radius-10">
                                    <img src="${item}" alt="${data.name}">
                                </figure>`;
                        });

                        $gallery.find('.product-image-slider').slick('unslick').html(imageHtml);

                        let thumbHtml = '';
                        data.image_with_sizes.thumb.forEach(function (item) {
                            thumbHtml += `<div>
                                <img src="${item}" alt="${data.name}">
                            </div>`;
                        });

                        $gallery.find('.slider-nav-thumbnails').slick('unslick').html(thumbHtml);

                        MartApp.productGallery(true, $gallery.find('.product-image-slider'));
                    }
                }
            }
        };

        if (jQuery().mCustomScrollbar) {
            $('.ps-custom-scrollbar').mCustomScrollbar({
                theme: 'dark',
                scrollInertia: 0
            });
        }

        $(document).on('click', '.toggle-show-more', function (event) {
            event.preventDefault();

            $('#store-short-description').fadeOut();

            $(this).hide();

            $('#store-content').slideDown(500);

            $('.toggle-show-less').show();
        });

        $(document).on('click', '.toggle-show-less', function (event) {
            event.preventDefault();

            $(this).hide();

            $('#store-content').slideUp(500);

            $('#store-short-description').fadeIn();

            $('.toggle-show-more').show();
        });

        let collapseBreadcrumb = function () {
            $('.page-breadcrumbs ol li').each(function () {
                let $this = $(this);
                if (!$this.is(':first-child') && !$this.is(':nth-child(2)') && !$this.is(':last-child')) {
                    if (!$this.is(':nth-child(3)')) {
                        $this.find('a').closest('li').hide();
                    } else {
                        $this.find('a').replaceWith('...');
                    }
                }
            });
        }

        if ($(window).width() < 768) {
            collapseBreadcrumb();
        }

        $(window).on('resize', function () {
            collapseBreadcrumb();
        });

        $('.product-entry-meta .anchor-link').on('click', function (e) {
            e.preventDefault();
            let target = $(this).attr('href');

            $('#product-detail-tabs a').removeClass('active');
            $(target).addClass('active');

            $('#product-detail-tabs-content > .tab-pane').removeClass('active show');
            $($(target).attr('href')).addClass('active show');

            $('html, body').animate(
                {
                    scrollTop: ($(target).offset().top - $('.header--product .navigation').height() - 250) + 'px',
                },
                0
            );
        });

        $(document).on('click', '.header-top .header-cart-button', event => {
            event.preventDefault();
            MartApp.$shopCart.show();
            MartApp.loadAjaxCart();
        });
    });
})(jQuery);
