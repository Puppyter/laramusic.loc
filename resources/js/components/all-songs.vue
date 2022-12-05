<template>

    <div class="" style="overflow: scroll; height:93.9vh">
        <audio-playyer></audio-playyer>
    <ais-instant-search
        index-name="songs"
        :search-client="searchClient"
    >
    <infinite-hits>
        <template slot="item" slot-scope="{ item }" class="row row-cols-3">
                <div class="card" style="width:15rem; height:20rem; margin: 1rem">
                    <img :src="item.image" alt="...">
                    <div class="card-body">
                        <p>{{item.name}}</p>
                        <p>{{item.album_id}}</p>
                        <p>{{item.author_id}}</p>
                    </div>
                </div>
        </template>
    </infinite-hits>
    </ais-instant-search>

    </div>
</template>

<script>

import InfiniteHits from "./infinite-hits";
import algoliasearch from "algoliasearch/lite";
export default {
    name: "all-songs",
    components: {InfiniteHits},
    data:()=>({
       songs:'',
        searchClient: algoliasearch(
            '3R65BU69SN',
            '50cd3689b8b34a28c68796c654726640'
        ),
    }),
    methods:{
        getSongs(){
          axios.get('/songs/get')
        },
    },
}
</script>

<style scoped>

</style>
