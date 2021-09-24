<template>
    <div >
        <label type="button" class="MyButton" style='border-radius:10px;' v-on:change="editmsg2">
            <span>{{msg}}</span>
            <input type="file" id = 'course' name = 'course'>
        </label>
        <input class="MyButton-path" disabled style='border-radius:15px;text-align: center;' v-model= "msg2">
    </div>
</template>


<script>
export default {
    props: ['msg','msg2'],
    mounted() {
        console.log('My Button is mounted.')
    },
    methods: {
        editmsg2(event){
            this.msg2 =event.target.files[0].name;
            console.log(event.target.files);
        }
    },
}
</script>