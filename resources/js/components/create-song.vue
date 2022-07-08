<template>
    <div>
        <label>Artist</label>
        <ais-instant-search
            index-name="artists"
            :search-client="searchClient"
        >
            <ais-autocomplete>
                <template v-slot="{ currentRefinement, indices, refine }">
                    <input
                        type="search"
                        :value="currentRefinement"
                        placeholder="Search for a artist"
                        @input="refine($event.currentTarget.value)"
                    >
                    <ul v-if="currentRefinement" v-for="index in indices" :key="index.indexId">
                        <li>
                            <h3>{{ index.indexName }}</h3>
                            <ul>
                                <li v-for="hit in index.hits" :key="hit.objectID">
                                    <ais-highlight attribute="name" :hit="hit"/>
                                    <button
                                        class="btn btn-primary"
                                        type="button"
                                        @click="chooseArtist(hit.id)"
                                    >
                                        Choose artist
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </template>
            </ais-autocomplete>
        </ais-instant-search>
        <label>Album</label>
        <div>
            <ul v-for="album in albums" :key="album.id">
                <li>
                   <h3>{{album.name}}</h3>
                    <button @click="this.albumId = album.id">Choose album</button>
                </li>
            </ul>
        </div>
        <label>Name</label>
        <input type="text" v-model="songName">
        <div class="input-group mb-3">
            <input class="filepond" type="file" ref="image" accept="image/*" @input="fileUpload">
            <div class="row row-cols-3">
                <div class="col" >
                    {{image.name}}
                    <img ref="image"  style="width: 200px; height: 200px; "/>
                </div>
            </div>
        </div>
        <button @click="uploadData">Create Album</button>
    </div>
</template>

<script>
import algoliasearch from "algoliasearch/lite";

export default {
    name: "create-song",
    data:()=>({
        albums: '',
        artistId:'',
        songName: '',
        albumId:'',
        image:'',
        track: '',
        searchClient: algoliasearch(
            '3R65BU69SN',
            '50cd3689b8b34a28c68796c654726640'
        ),
    }),
    methods:{
      getAlbums(){
          const data = new FormData;
          data.append('artistId',this.artistId)
          axios.post('/album/get',data ,{
              headers:{
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data})=>{
                  console.log(data)
                  this.albums = data.albums;
              })
              .catch(error =>{
                  console.log(error.response)
              })
      },
        chooseArtist(id) {
            this.artistId = id;
            this.getAlbums();
        }
    },
}
</script>

<style scoped>

</style>
