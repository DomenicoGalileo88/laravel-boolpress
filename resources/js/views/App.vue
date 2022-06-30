<template>
  <div>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
           <!-- logo o titolo sito -->
            <router-link class="navbar-brand" :to="{ name: 'home' }">
                Boolpress
            </router-link>
            <!-- /.navbar-brand -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" v-for="item in menu_items" :key="item.route_id">
                        <router-link class="nav-link" :to="{ name: item.route_name}">{{item.route_text}}</router-link>
                    </li>
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                </ul>
            </div>
        </div>
    </nav>

    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  data(){
    return{
      menu_items: [
        {
          route_id: 1,
          route_name: 'home',
          route_text: 'Home'
        },
        {
          route_id: 2,
          route_name: 'about',
          route_text: 'About'
        },
        {
          route_id: 3,
          route_name: 'posts',
          route_text: 'Posts'
        },
      ]
    }
  }
};
</script>

<style lang="scss">

</style>