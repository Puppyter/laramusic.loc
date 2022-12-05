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
                        placeholder="Search an artist"
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
       <select v-model="albumId">
           <option v-for="album in albums" :value="album.id">{{album.name}}</option>
       </select>
        <label>Genre</label>
        <select v-model="genreId">
            <option v-for="genre in genres" :value="genre.id">{{genre.name}}</option>
        </select>
        <label>Name</label>
        <input type="text" v-model="songName">
        <div class="input-group mb-3">
            <label>Image</label>
            <input class="filepond" type="file" ref="image" accept="image/*" @input="fileUploadImage">
<!--            <div class="row row-cols-3">-->
<!--                <div class="col" >-->
<!--                    {{image.name}}-->
<!--                    <img ref="image"  style="width: 200px; height: 200px; "/>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="input-group mb-3">
            <label>Song</label>
            <input class="filepond" type="file" ref="song" accept=".mp3, audio/*" @input="fileUploadSong">
            <!--            <div class="row row-cols-3">-->
            <!--                <div class="col" >-->
            <!--                    {{image.name}}-->
            <!--                    <img ref="image"  style="width: 200px; height: 200px; "/>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <button @click="uploadData">Save Song</button>
    </div>
</template>

<script>
import algoliasearch from "algoliasearch/lite";

export default {
    name: "create-song",
    data:()=>({
        genres:'',
        song:'',
        genreId:'',
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
        getGenres(){
            axios.get('/genre/get')
                .then(({data})=>{
                    this.genres = data.genres;
                })
        },
        uploadData(){
            const data = new FormData;
            data.append('artist_id',this.artistId);
            data.append('album_id',this.albumId);
            data.append('image',this.image);
            data.append('track',this.track);
            data.append('name',this.songName);
            data.append('genre_id',this.genreId)
            axios.post('/song/store', data,{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type':'multipart/form-data',
                }
            })
                .then(({data})=>{
                    console.log(data);
                })
                .catch(error =>{
                    console.log(error.response);
                })
        },
        changeAlbumId(id) {
            this.albumId = id;
        },
        fileUploadImage() {
            this.image = this.$refs.image.files[0];
            console.log(this.image);
        },
        fileUploadSong() {
          this.track = this.$refs.song.files[0];
          console.log(this.track)
        },
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
    mounted() {
        this.getGenres();
    }
}
</script>

<style scoped>

</style>
