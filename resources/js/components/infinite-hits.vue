<template>
    <div v-if="state" class="row row-cols-4">
        <div v-for="hit in state.hits" :key="hit.objectID" class="col">
            <slot name="item" :item="hit"> </slot>
        </div>
        <div class="sentinel" v-observe-visibility="visibilityChanged" />
    </div>
</template>

<script>
import { createWidgetMixin } from 'vue-instantsearch';
import { connectInfiniteHits } from 'instantsearch.js/es/connectors';

export default {
    name: "infinite-hits",
    mixins: [createWidgetMixin({ connector: connectInfiniteHits })],
    methods: {
        visibilityChanged(isVisible) {
            if (isVisible && !this.state.isLastPage) {
                this.state.showMore();
            }
        },
    },
}
</script>

<style scoped>

</style>
