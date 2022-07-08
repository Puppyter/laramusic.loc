<template>
    <ais-instant-search
        index-name="artists"
        :search-client="searchClient"
    >
        <infinite-hits>
            <template v-slot:item="item">
                <img :src="item.image" alt="...">
            </template>
        </infinite-hits>
    </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import InfiniteHits from "./infinite-hits";

export default {
    name: "show-artists",
    components: {InfiniteHits},
    data:()=>({
        searchClient: algoliasearch(
            '3R65BU69SN',
            '50cd3689b8b34a28c68796c654726640'
        ),
    }),
};
</script>

<style scoped>

</style>
