<template>
    <div>
        <div>
            <div class="col">
                <p class="h1">Registration</p>
            </div>
            <div class="col" style="margin-top: 2em">
                <label class="text-black-50">Name</label>
                <input type="text" v-model="name">
            </div>
            <div class="col" style="margin-top: 2em">
                <label class="text-black-50">Email</label>
                <input type="text" v-model="email">
            </div>
            <div class="col" style="margin-top: 2em">
                <label class="text-black-50">Password</label>
                <input type="password" v-model="password">
            </div>
            <button
                style="margin-top: 2em; margin-bottom: 3em"
                @click="reg"
                class="btn btn-light border border-secondary text-black-50"
            >
                Register
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "register",
    data:()=>({
       email:'',
       password:'',
        name:''
    }),
    methods:{
        reg(){
            axios.post('/register',{email:this.email, password:this.password,name:this.name},{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data);
                })
                .catch((error)=>{
                    console.log(error.response);
                })
        }
    }
}
</script>

<style scoped>

</style>
