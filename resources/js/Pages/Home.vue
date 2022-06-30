<template>
  <div class="page_home">
    <div class="py-4 bg-dark text-white">
      <div class="container">
        <h1 class="display-3">Home</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
      </div>
    </div>

    <section class="recent_posts">
      <div class="container py-3">
        <h2 class="py-3 text-center">Recent Posts</h2>
        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
          <div class="col" v-for="post in posts" :key="post.id">
            <div class="card">
              <img :src="'/storage/' + post.cover_image" :alt="post.title">
              <div class="card-body">
                <p>
                  {{post.content.slice(0, 100) + '...'}}
                </p>
                <a href="#">Read more</a>
              </div>
            </div>
          </div>
        </div>
        <div class="go_blog text-center py-4">
        <router-link class="btn btn-dark text-white" :to="{name: 'posts'}">Visit posts</router-link>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Axios from 'axios';
export default {
    name: 'Home',
    data(){
      return{
        posts: '',
      }
    },
    mounted(){
      Axios.get('/api/posts')
      .then(response => {
        console.log(response.data);
        const posts = response.data.data;
        this.posts = posts.slice(0, 4);
      })
      .catch(e => {
        console.error(e);
      })
    }
}
</script>

<style>

</style>