<template>
<div class="row">
    <div class="btn-group" role="group" aria-label="Basic outlined example">
        <button type="button" @click="getPreviosTrack" class="btn btn-outline-secondary">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-chevron-double-left"
                viewBox="0 0 16 16"
            >
                <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </button>
        <button type="button" @click="play" class="btn btn-outline-secondary" v-if="state==='pause'">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-play"
                viewBox="0 0 16 16"
            >
                <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
            </svg>
        </button>
        <button type="button" @click="pause" class="btn btn-outline-secondary" v-if="state==='play'">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-pause"
                viewBox="0 0 16 16"
            >
                <path d="M6 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm4 0a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        <button type="button" @click="getNextTrack" class="btn btn-outline-secondary">
            <svg xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 fill="currentColor"
                 class="bi bi-chevron-double-right"
                 viewBox="0 0 16 16"
            >
                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </button>
    </div>
    <div class="progress">
        <div class="progress-bar" :style="{width: progress+'%'}" role="progressbar" aria-label="Basic example" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

</div>
</template>

<script>
export default {
    name: "audioPlayyer",
    props:['audioList'],
    data:()=>({
        currentTrack:0,
        state:'pause',
        progress:10,
    }),
    methods: {
        pause() {

        },
        play() {

        },
        getNextTrack(){

        },
        getPreviosTrack(){

        }
    }
}
</script>

<style scoped>
</style>
