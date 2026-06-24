<template>
  <div class="container">
    <h1>City Tours</h1>
    <TourForm @created="refresh" />
    <ToursList ref="list" />
  </div>
</template>

<script setup>
import { ref } from 'vue'
import ToursList from './components/ToursList.vue'
import TourForm from './components/TourForm.vue'

const list = ref(null)
function refresh() {
  list.value?.fetchTours()
}
</script>

<style>
.container { max-width:800px; margin:2rem auto; font-family:Arial,Helvetica,sans-serif }
</style>
