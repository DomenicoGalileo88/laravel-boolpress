<template>
  <div class="page">
    
    <div class="py-4 bg-dark text-white">
      <div class="container">
        <h1 class="display-3">Page not found!! 404</h1>
      </div>
    </div>

    <div class="container py-5">
        <p class="lead">
            La pagina richiesta non esiste, puoi visitare le pagine:
        </p>

        <ul>
            <li>
                <router-link :to="{name: 'home'}">HomePage</router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}">About</router-link>
            </li>
            <li>
                <router-link :to="{name: 'posts'}">Posts</router-link>
            </li>
        </ul>
    </div>

  </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style>

</style>