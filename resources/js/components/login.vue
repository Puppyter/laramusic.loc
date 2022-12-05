<template>
    <div>
        <div>
            <div class="col">
                <p class="h1">Login</p>
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
                @click="login"
                class="btn btn-light border border-secondary text-black-50"
            >
                Login
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "login",
    data: () => ({
        password: '',
        email: '',
    }),
    methods:{
      login(){
        const data = new FormData;
        data.append('password',this.password);
        data.append('email', this.email);
        axios.post('/login',data,{
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
            .then(({data}) => {
                console.log(data)
                if (data.status === true) {
                    window.location.href = '/'+data.user+'/homepage';
                }
            })
            .catch((error) =>{
                console.log(error.response)
            })
      },
    },
}
</script>

<style scoped>

</style>
