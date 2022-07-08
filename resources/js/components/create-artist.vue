<template>
    <div>
        <label>Artist Name</label>
        <input type="text" v-model="artistName">
        <div class="input-group mb-3">
            <input class="filepond" type="file" ref="image" accept="image/*" @input="fileUpload">
        </div>
        <button @click="uploadData">Create Artist</button>
    </div>
</template>

<script>
export default {
    name: "create-artist",
    data:() => ({
        image: '',
        artistName: '',
    }),
    methods:{
        fileUpload(){
            this.image = this.$refs.image.files;
            //     for( let i = 0; i < uploadedFiles.length; i++ ){
            //         this.images.push( uploadedFiles[i] );
            //     }
        },
        getImagePreviews(){
            for( let i = 0; i < this.image.length; i++ ){

                if ( /\.(jpe?g|png|gif)$/i.test( this.image[i].name ) ) {

                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['image'+parseInt( i )][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.image[i] );
                }
            }
        },
        uploadData(){
            const data = new FormData;
            data.append('name',this.artistName)
            data.append('image',this.image[0]);
            axios.post('/artist/store',data,{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
