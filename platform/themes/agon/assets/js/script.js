(function ($) {
    'use strict';
    // Page loading
    $(window).on('load', function () {
        $('#preloader-active').fadeOut('slow');
    });
    /*-----------------
          Menu Stick
      -----------------*/
    let header = $('.sticky-bar');
    let win = $(window);
    win.on('scroll', function () {
        let scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
            $('.header-style-2 .categories-dropdown-active-large').removeClass(
                'open'
            );
            $('.header-style-2 .categories-button-active').removeClass('open');
        } else {
            header.addClass('stick');
        }
    });
    /*------ Wow Active ----*/
    new WOW().init();
    //sidebar sticky
    if ($('.sticky-sidebar').length) {
        $('.sticky-sidebar').theiaStickySidebar();
    }
    /*----------------------------
          Category toggle function
      ------------------------------*/
    if ($('.categories-button-active').length) {
        let searchToggle = $('.categories-button-active');
        searchToggle.on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                $(this)
                    .siblings('.categories-dropdown-active-large')
                    .removeClass('open');
            } else {
                $(this).addClass('open');
                $(this).siblings('.categories-dropdown-active-large').addClass('open');
            }
        });
    }
    /*---------------------
          Select active
      --------------------- */
    if ($('.select-active').length) {
        $('.select-active').select2();
    }

    // Isotope active
    if ($('.grid').length) {
        $('.grid').imagesLoaded(function () {
            // init Isotope
            let $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
                layoutMode: 'masonry',
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.grid-item',
                },
            });
        });
    }

    /*====== SidebarSearch ======*/
    function sidebarSearch() {
        let searchTrigger = $('.search-active'),
            endTriggersearch = $('.search-close'),
            container = $('.main-search-active');
        searchTrigger.on('click', function (e) {
            e.preventDefault();
            container.addClass('search-visible');
        });
        endTriggersearch.on('click', function () {
            container.removeClass('search-visible');
        });
    }

    sidebarSearch();

    /*====== Sidebar menu Active ======*/
    function mobileHeaderActive() {
        let navbarTrigger = $('.burger-icon'),
            endTrigger = $('.mobile-menu-close'),
            container = $('.mobile-header-active'),
            wrapper4 = $('body');
        wrapper4.prepend('<div class="body-overlay-1"></div>');
        navbarTrigger.on('click', function (e) {
            navbarTrigger.toggleClass('burger-close');
            e.preventDefault();
            container.toggleClass('sidebar-visible');
            wrapper4.toggleClass('mobile-menu-active');
        });
        endTrigger.on('click', function () {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('mobile-menu-active');
        });
        $('.body-overlay-1').on('click', function () {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('mobile-menu-active');
            navbarTrigger.removeClass('burger-close');
        });
    }

    mobileHeaderActive();
    /*---------------------
          Mobile menu active
      ------------------------ */
    let $offCanvasNav = $('.mobile-menu'),
        $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');
    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu
        .parent()
        .prepend(
            '<span class="menu-expand"><i class="fi-rr-angle-small-down"></i></span>'
        );
    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();
    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .menu-expand', function (e) {
        let $this = $(this);
        if (
            $this
                .parent()
                .attr('class')
                .match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/) &&
            ($this.attr('href') === '#' || $this.hasClass('menu-expand'))
        ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length) {
                $this.parent('li').removeClass('active');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active');
                $this
                    .closest('li')
                    .siblings('li')
                    .removeClass('active')
                    .find('li')
                    .removeClass('active');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.siblings('ul').slideDown();
            }
        }
    });

    /*--- language currency active ----*/
    $('.mobile-language-active').on('click', function (e) {
        e.preventDefault();
        $('.lang-dropdown-active').slideToggle(900);
    });

    /*--- categories-button-active-2 ----*/
    $('.categories-button-active-2').on('click', function (e) {
        e.preventDefault();
        $('.categori-dropdown-active-small').slideToggle(900);
    });

    /*--- Mobile demo active ----*/
    let demo = $('.tm-demo-options-wrapper');
    $('.view-demo-btn-active').on('click', function (e) {
        e.preventDefault();
        demo.toggleClass('demo-open');
    });

    /*-----More Menu Open----*/
    $('.more_slide_open').slideUp();
    $('.more_categories').on('click', function () {
        $(this).toggleClass('show');
        $('.more_slide_open').slideToggle();
    });

    $('.list-tags-job .remove-tags-job').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.job-tag').remove();
    });

    $(function () {
        /*---- CounterUp ----*/
        if ($('.count').length) {
            $('.count').counterUp({
                delay: 10,
                time: 600,
            });
        }

        // Video popup
        if ($('.popup-youtube').length) {
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
            });
        }

        /* --- SwiperJS --- */
        $('.swiper-group-6').each(function () {
            const $this = $(this);
            const $box = $(this).closest('.box-swiper');

            new Swiper($this[0], {
                spaceBetween: 30,
                slidesPerView: 6,
                slidesPerGroup: 2,
                loop: true,
                navigation: {
                    nextEl: $box.find('.swiper-button-next')[0],
                    prevEl: $box.find('.swiper-button-prev')[0],
                },
                autoplay: {
                    delay: 10000,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 6,
                    },
                    800: {
                        slidesPerView: 4,
                    },
                    400: {
                        slidesPerView: 2,
                    },
                    350: {
                        slidesPerView: 2,
                        slidesPerGroup: 1,
                        spaceBetween: 15,
                    },
                },
            });
        });
        $('.swiper-group-4').each(function () {
            const $this = $(this);
            const $box = $(this).closest('.box-swiper');

            new Swiper($this[0], {
                spaceBetween: 20,
                slidesPerView: 4,
                slidesPerGroup: 1,
                loop: true,
                navigation: {
                    nextEl: $box.find('.swiper-button-next')[0],
                    prevEl: $box.find('.swiper-button-prev')[0],
                },
                autoplay: {
                    delay: 10000,
                },
                breakpoints: {
                    1299: {
                        slidesPerView: 4,
                    },
                    1150: {
                        slidesPerView: 4,
                    },
                    750: {
                        slidesPerView: 2,
                    },
                    600: {
                        slidesPerView: 1,
                    },
                    550: {
                        slidesPerView: 1,
                    },
                    300: {
                        slidesPerView: 1,
                    },
                    200: {
                        slidesPerView: 1,
                    },
                },
            });
        });
        $('.swiper-group-3').each(function () {
            const $this = $(this);
            const $box = $(this).closest('.box-swiper');

            new Swiper($this[0], {
                spaceBetween: 30,
                slidesPerView: 3,
                slidesPerGroup: 1,
                loop: true,
                navigation: {
                    nextEl: $box.find('.swiper-button-next')[0],
                    prevEl: $box.find('.swiper-button-prev')[0],
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    bulletActiveClass: 'swiper-pagination-customs-active',
                    bulletClass: 'swiper-pagination-customs',
                    clickable: true,
                },
                autoplay: {
                    delay: 10000,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 3,
                    },
                    800: {
                        slidesPerView: 2,
                    },
                    600: {
                        slidesPerView: 1,
                    },
                    350: {
                        slidesPerView: 1,
                    },
                    310: {
                        slidesPerView: 1,
                    },
                    200: {
                        slidesPerView: 1,
                    },
                },
            });
        });
        $('.swiper-group-2').each(function () {
            const $this = $(this);
            const $box = $(this).closest('.box-swiper');

            new Swiper($this[0], {
                spaceBetween: 30,
                slidesPerView: 2,
                slidesPerGroup: 1,
                loop: true,
                navigation: {
                    nextEl: $box.find('.swiper-button-next')[0],
                    prevEl: $box.find('.swiper-button-prev')[0],
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    bulletActiveClass: 'swiper-pagination-customs-active',
                    bulletClass: 'swiper-pagination-customs',
                    clickable: true,
                },
                autoplay: {
                    delay: 10000,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 2,
                    },
                    800: {
                        slidesPerView: 1,
                    },
                    600: {
                        slidesPerView: 1,
                    },
                    400: {
                        slidesPerView: 1,
                    },
                    350: {
                        slidesPerView: 1,
                    },
                },
            });
        });
        $('.swiper-group-1').each(function () {
            const $this = $(this);
            const $box = $(this).closest('.box-swiper');

            new Swiper($this[0], {
                spaceBetween: 0,
                slidesPerView: 1,
                slidesPerGroup: 1,
                loop: true,
                navigation: {
                    nextEl: $box.find('.swiper-button-next')[0],
                    prevEl: $box.find('.swiper-button-prev')[0],
                },
                autoplay: {
                    delay: 10000,
                },
            });
        });

        /*------ Timer Countdown ----*/
        $('[data-countdown]').each(function () {
            const $this = $(this);
            const finalDate = $this.data('countdown');
            $this.countdown(finalDate, function (event) {
                $(this).html(
                    event.strftime(
                        `<span class='countdown-section'><span class='countdown-amount hover-up'>%D</span><span class='countdown-period'> ${window.trans['days']} </span></span>
              <span class='countdown-section'><span class='countdown-amount hover-up'>%H</span><span class='countdown-period'> ${window.trans['hours']} </span></span>
              <span class='countdown-section'><span class='countdown-amount hover-up'>%M</span><span class='countdown-period'> ${window.trans['mins']} </span></span>
              <span class='countdown-section'><span class='countdown-amount hover-up'>%S</span><span class='countdown-period'> ${window.trans['sec']} </span></span>`
                    )
                );
            });
        });

        // Init function billed
        checkBilled();
    });
})(jQuery);

// Check billed
function checkBilled() {
    let checkBox = $('input[name=billed_type]');
    checkBox.on('change', function (e) {
        let $this = $(this);
        let forMonth = $this.closest('section').find('.for-month');
        let forYear = $this.closest('section').find('.for-year');
        let billMonth = $this.closest('section').find('.text-billed-month');
        let billYear = $this.closest('section').find('.text-billed-year');
        for (let i = 0; i < forMonth.length; i++) {
            if ($this.is(':checked')) {
                forYear.eq(i).addClass('display-year');
                forMonth.eq(i).removeClass('display-month');
                billYear.addClass('active');
                billMonth.removeClass('active');
            } else {
                forYear.eq(i).removeClass('display-year');
                forMonth.eq(i).addClass('display-month');
                billMonth.addClass('active');
                billYear.removeClass('active');
            }
        }
    });

    $(document).on('click', '.block-price-item', function () {
        let $this = $(this);
        let $section = $this.closest('section');
        $section.find('.block-price-item').removeClass('active');
        $this.addClass('active');

        $section.find('.list-package-feature').html($this.find('.block-package-feature').html());
    });
}

$(document).ready(function () {
    $('.product-info .anchor-link').on('click', function (e) {
        e.preventDefault();
        let target = $(this).attr('href');

        $('.product-description ul.nav li a').removeClass('active');
        $(target).addClass('active');

        $('.product-description .tab-content > .tab-pane').removeClass('active show');
        $($(target).attr('href')).addClass('active show');

        $('html, body').animate(
            {
                scrollTop: ($(target).offset().top - $('body > .header').height() - 120) + 'px',
            },
            0
        );
    });
});
