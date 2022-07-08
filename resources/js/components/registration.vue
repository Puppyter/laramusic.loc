<template>
     <div>
         <div class="col">
         <p class="h1">Register</p>
         </div>
         <div class="col" style="margin-top: 2em">
         <p>Register New Account</p>
         </div>
         <div class="col" style="margin-top: 2em">
         <label class="text-black-50">Username</label>
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
         <button style="margin-top: 2em; margin-bottom: 3em" @click="uploadData" class="btn btn-light border border-secondary text-black-50">Register</button>
     </div>
</template>

<script>
export default {
    name: "registration",
    props:['route'],
    data: () => ({
        name: '',
        password: '',
        email: '',
        csrf: ''
    }),
    methods:{
        uploadData(){
            const data = new FormData;
            data.append('name',this.name);
            data.append('email',this.email);
            data.append('password',this.password);
            axios.post(this.route,data,{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = '/user/';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    },
}
</script>

<style scoped>

</style>
