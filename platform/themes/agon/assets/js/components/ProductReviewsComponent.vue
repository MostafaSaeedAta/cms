<template>
    <div class="comment-list">
        <div class="single-comment justify-content-between mb-30" v-for="item in data" :key="item.id">
            <div class="user justify-content-between d-flex">
                <div class="thumb text-center">
                    <img :src="item.user_avatar" :alt="item.user_name">
                    <p class="font-heading text-brand">{{ item.user_name }}</p>
                </div>
                <div class="desc">
                    <div class="d-flex justify-content-between mb-10">
                        <div class="d-flex align-items-center">
                            <span class="font-xs text-muted" :datetime="item.created_at_tz">{{ item.created_at }}</span>
                        </div>
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" :style="{width: item.star * 20 + '%'}"></div>
                        </div>
                    </div>
                    <div>
                        <p class="mb-10 color-gray-500">{{ item.comment }}</p>
                    </div>
                    <div class="review-images" v-if="item.images && item.images.length">
                        <a :href="image.full_url" v-for="(image, index) in item.images" v-bind:key="index">
                            <img :src="image.thumbnail" :alt="image.thumbnail" class="img-fluid rounded h-100">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="!isLoading && !data.length" class="text-center">
            <p>{{ __('No reviews!') }}</p>
        </div>

        <div v-if="isLoading" class="review__loading">
            <div class="half-circle-spinner">
                <div class="circle circle-1"></div>
                <div class="circle circle-2"></div>
            </div>
        </div>

        <div class="pagination">
            <pagination :data="meta" @on-click-paging="onClickPaginate"/>
        </div>
    </div>
</template>

<script>
import Pagination from './utils/Pagination.vue';

export default {
    data: function () {
        return {
            isLoading: true,
            data: [],
            meta: {},
            star: 0,
        };
    },
    props: {
        url: {
            type: String,
            default: () => null,
            required: true
        },
    },
    mounted() {
        this.getData(this.url, false);
    },
    methods: {
        getData(link, animation = true) {
            this.isLoading = true;
            if (animation) {
                $('html, body').animate({
                    scrollTop: $('.product-reviews-container').offset().top + 'px',
                }, 1500);
            }
            axios.get(link)
                .then(res => {
                    this.data = res.data.data || [];
                    this.meta = res.data.meta;
                    this.isLoading = false;

                    $('.product-reviews-container .product-reviews-header').html(res.data.message);
                })
                .catch(() => {
                    this.isLoading = false;
                });
        },
        onClickPaginate({element}) {
            if (!element.active) {
                this.getData(element.url);
            }
        }
    },
    updated: function () {
        let $galleries = $('.product-reviews-container .review-images');
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
    },
    components: {
        Pagination
    }
}
</script>
