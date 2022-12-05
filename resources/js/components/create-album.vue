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
                                        @click="artistId = hit.id"
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
       <label>Name</label>
        <input type="text" v-model="albumName">
        <div class="input-group mb-3">
            <input class="filepond" type="file" ref="image" accept="image/*" @input="fileUpload">
        </div>
        <button @click="uploadData">Create Album</button>
    </div>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
export default {
    name: "create-album",
    data:()=>({
        artistId: '',
        albumName:'',
        image:'',
        searchClient: algoliasearch(
            '3R65BU69SN',
            '50cd3689b8b34a28c68796c654726640'
        ),
    }),
    methods:{
        fileUpload(){
            this.image = this.$refs.image.files[0];
            console.log(this.image);
            //     for( let i = 0; i < uploadedFiles.length; i++ ){
            //         this.images.push( uploadedFiles[i] );
            //     }
            // this.getImagePreviews();
        },
        getImagePreviews(){
            for( let i = 0; i < this.image.length; i++ ){

                if ( /\.(jpe?g|png|gif)$/i.test( this.image.name ) ) {

                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['image'+parseInt( i )].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.image );
                }
            }
        },
        uploadData(){
            const data = new FormData;
            data.append('artistId', this.artistId)
            data.append('name',this.albumName);
            data.append('image',this.image);
            axios.post('/album/store',data, {
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type':'multipart/form-data',
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        alert('Create')
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        }
    }
}
</script>

<style scoped>

</style>
