<template>
  <div class="page_post">
    <div class="wrapper" v-if="!loading">
      <div class="p-5 bg-light">
        <div class="container">
          <h1 class="display-3">{{ post.title }}</h1>
          <div class="content d-flex">
            <img
              width="500px"
              class="img-fluid"
              :src="'/storage/' + post.cover_image"
              :alt="post.title"
            />

            <div class="metadata ms-4">
              <div class="category" v-if="post.category">
                <h5>Category:</h5>
                {{ post.category.name }}
              </div>

              <div class="author">
                <h5>Author:</h5>
                {{ post.user.name }}
              </div>

              <div class="post_tags" v-if="post.tags.length > 0">
                <h5>Tags:</h5>
                <ul>
                  <li v-for="tag in post.tags" :key="tag.id">
                    #{{ tag.name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="description mt-4">
            <h4>Description:</h4>
            {{ post.content }}
          </div>
        </div>
      </div>
    </div>
    <div class="load d-flex justify-content-center" v-else>
      <h3>Loading</h3>
      <div class="loading"></div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "Post",
  data() {
    return {
      post: "",
      loading: true,
    };
  },
  mounted() {
    Axios.get("/api/posts/" + this.$route.params.slug)
      .then((response) => {
        console.log(response.data);
        this.post = response.data;
        this.loading = false;
      })
      .catch((e) => {
        console.error(e);
      });
  },
};
</script>

<style lang="scss">
.category,
.author,
.post_tag {
  margin-bottom: 1rem;
}

.post_tags {
  ul {
    display: flex;
    li {
      list-style: none;
    }
  }
}

.loading {
  border: 16px solid black;
  border-top: 16px solid coral;
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>