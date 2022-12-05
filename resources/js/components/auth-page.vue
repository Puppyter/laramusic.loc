<template>
    <div>
        <div>
            <span>
                <a @click="page='login'">login</a>
                <p>/</p>
                <a @click="page='register'">register</a>
            </span>
        </div>
        <register v-if="page==='register'"></register>
        <login v-if="page==='login'"></login>
    </div>
</template>

<script>
export default {
    name: "auth-page",
    data: () => ({
        page: 'login'
    }),
}
</script>

<style scoped>

</style>
