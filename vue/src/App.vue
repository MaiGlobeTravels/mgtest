<script setup>
import { RouterView } from 'vue-router';
</script>

<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Tour App</a>
      </div>
    </nav>

    <RouterView />
  </div>
</template>