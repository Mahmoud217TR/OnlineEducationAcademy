<template>
        <button class="btn btn-primary mt-3" style="margin: auto ;" @click="favoriteThis" title = "Add to my watch list">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                <path :d="buttonText"/>
            </svg>
        </button>
</template>

<script>
export default {
    props: ['userId','courseId','interested','path'],

    mounted() {
        console.log('Component mounted.')
    },

    data: function (){
        return{
            status: this.interested,
        }
    },

    methods: {
        favoriteThis(){
            axios.post('/interestedInCourse/'+this.userId+'/'+this.courseId)
                .then(response => {
                    this.status = !this.status;
                    console.log(response.data);
            }).catch(errors => {
                if(errors.response.status == 401){
                    window.location = '/login';
                }
            });
        }
    },

    computed: {
        buttonText(){
            if(this.status){
                return 'M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z';
            }else{
                return 'M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z';
            }
            
        }
    }
}
</script>
