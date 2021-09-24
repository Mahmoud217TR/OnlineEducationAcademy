<template>
    <video id="plyr" playsinline controls style= "--plyr-color-main:#e1b12c;--plyr-control-icon-size:20px;--plyr-control-radius:10px">
        <source :src="path" />
    </video>
</template>


<script>
export default {
    props: ['path'],
    mounted() {
        const player = new Plyr('#plyr');
        console.log('Video plyr mounted.')
    },
}
</script>