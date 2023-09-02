<template>
    <renderless-pagination
        :data="data"
        @on-click-paging="onPaginationChangePage">
        <div v-if="computed.hasPages"
            slot-scope="{ data, computed, pageButtonEvents }"
            class="paginations">
            <ul class="pager">
                <li v-for="(element, index) in data.links"
                    :key="index + element.url"
                    :class="{active: element.active, disabled: !element.url}"
                    :aria-disabled="element.active ? 'true' : null">
                    <a :href="element.url"
                        :rel="index == 0 ? 'previous' : (index == data.links.length - 1) ? 'next' : null"
                        :aria-label="element.label"
                        :class="{
                            'prev-page': index == 0,
                            'next-page': (index == data.links.length - 1),
                            'disabled': element.active
                        }"
                        v-on="pageButtonEvents({element, page: element.label})"
                        v-html="index == 0 || (index == data.links.length - 1) ? '' : element.label"></a>
                </li>
            </ul>
        </div>
    </renderless-pagination>
</template>

<script>
import RenderlessPagination from './RenderlessPagination.vue';

export default {
    props: {
        data: {
            type: Object,
            default: () => {}
        },
    },
    methods: {
        onPaginationChangePage (params) {
            this.$emit('on-click-paging', params);
        },
    },
    components: {
        RenderlessPagination
    }
}
</script>
