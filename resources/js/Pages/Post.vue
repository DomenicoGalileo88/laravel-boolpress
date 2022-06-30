<template>
  <div class="page_post">
    <h1>{{$route.paraams.slug}}</h1>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
    name: 'Post',
    data(){
        return{
            post: '',
        }
    },
    mounted(){
        Axios.get('api/popsts/' + this.$route.params.slug)
        .then(response => {
            //console.log(response.data);
            this.post = response.data;
        })
        .catch(e => {
            console.error(e);
        })
    }
}
</script>

<style>

</style>