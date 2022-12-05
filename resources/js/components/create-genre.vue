<template>
    <div>

        <label>Genre Name</label>
        <input type="text" v-model="genreName">
        <button @click="uploadData">Create Genre</button>
    </div>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';

export default {
    name: "create-genre",
    data:() => ({
        artistName: '',
        genreName: '',
        searchClient: algoliasearch(
            '3R65BU69SN',
            '50cd3689b8b34a28c68796c654726640'
        ),
    }),
    methods:{
        uploadData(){
            const data = new FormData;
            data.append('name',this.genreName)
            axios.post('/genre/store',data,{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = '/';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    }
}
</script>

<style scoped>

</style>
