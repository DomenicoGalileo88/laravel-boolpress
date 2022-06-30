<template>
  <div>
    <SiteJumbotron />

    <div class="container-fluid">
      <div class="row">
        <main class="col-12 col-md-9 col-lg-10">
          <section class="posts">
            <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <div class="col" v-for="post in posts.data" :key="post.id">
                  <div class="post card">
                    <img
                      class="img-fluid"
                      :src="'storage/' + post.cover_image"
                      :alt="post.title"
                    />
                    <div class="card-body">
                      <h3>{{ post.title }}</h3>
                      <p>{{trimText(post.content)}}</p>
                      <a href="" v-if="post.content.length > 50">Read more</a>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col">
                          <div class="author" v-if="post.user">
                            <strong>Author: </strong>
                            {{ post.user.name }}
                          </div>
                        </div>

                        <div class="col">
                          <span v-if="post.category">
                            <strong>Category: </strong>
                            {{ post.category.name }}
                          </span>

                          <div class="card_tags" v-if="post.tags.length > 0">
                            <strong>Tags: </strong>
                            <ul class="d-flex">
                              <li v-for="tag in post.tags" :key="tag.id">
                                #{{ tag.name }}
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center pt-5">
                  <li class="page-item" v-if="posts.current_page > 1">
                    <a
                      class="page-link"
                      href="#"
                      aria-label="Previous"
                      @click.prevent="getAllPosts(posts.current_page - 1)"
                    >
                      <span aria-hidden="true">&laquo;</span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                  </li>
                  <li
                    :class="{
                      'page-item': true,
                      active: page == posts.current_page,
                    }"
                    v-for="page in posts.last_page"
                    :key="page"
                  >
                    <a class="page-link" href="#" @click="getAllPosts(page)">{{
                      page
                    }}</a>
                  </li>

                  <li
                    class="page-item"
                    v-if="posts.current_page < posts.last_page"
                  >
                    <a
                      class="page-link"
                      href="#"
                      aria-label="Next"
                      @click.prevent="getAllPosts(posts.current_page + 1)"
                    >
                      <span aria-hidden="true">&raquo;</span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </section>
        </main>
        <!-- /.col-12 col-md-9 col-lg-10 -->

        <aside class="col-12 col-md-3 col-lg-2">
          <div class="categories">
            <h5>Category:</h5>
            <ul>
              <li v-for="category in categories" :key="category.id">
                {{ category.name }}
              </li>
            </ul>
          </div>

          <div class="tags">
            <h5>Tag:</h5>
            <ul>
              <li v-for="tag in tags" :key="tag.id">
                #{{ tag.name }}
              </li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</template>

<script>
import SiteJumbotron from "../components/SiteJumbotron";
export default {
  name: "App",
  components: { SiteJumbotron },
  data() {
    return {
      posts: "",
      categories: "",
      tags: "",
    };
  },
  methods: {
    getAllPosts(postPage) {
      axios
        .get("/api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          console.log(response);
          this.posts = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllCategories() {
      axios
        .get("/api/categories", {})
        .then((response) => {
          console.log(response);
          this.categories = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllTags() {
      axios
        .get("/api/tags", {})
        .then((response) => {
          console.log(response);
          this.tags = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    trimText(text){
        if (text.length > 50) {
          return text.slice(0, 50) + '...'
        }
        return text;
    }
  },
  mounted() {
    console.log("mounted");
    this.getAllPosts(1);
    this.getAllCategories();
    this.getAllTags();
  },
};
</script>

<style lang="scss">
.card{
  height: 100%;
  box-shadow: 0 0 10px lightgray;
  border-radius: 0.5rem;
  img{
        aspect-ratio: 1/1;
        object-fit: contain;
        object-position: top;
        height: 50%;
}
  }

.card_tags{
  li{
    list-style: none;
  }
}

.categories, .tags{
  background-color: #f0eded;
  border-radius: 1rem;
  padding: 1rem;
  li{
    list-style: none;
  }
}

.tags{
  margin-top: 1rem;
}

.card-footer{
  min-height: 100px;
}
</style>