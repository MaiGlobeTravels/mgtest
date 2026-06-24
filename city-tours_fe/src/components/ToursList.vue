<template>
  <div>
    <h2>All Tours</h2>
    <ul>
      <li v-for="tour in tours" :key="tour.id">{{ tour.title }} — {{ tour.price }}</li>
    </ul>
    <div v-if="loading">Loading...</div>
    <div v-if="error" style="color:red">{{ error }}</div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import api from '../api/axios'

const tours = ref([])
const loading = ref(false)
const error = ref(null)

async function fetchTours() {
  loading.value = true
  error.value = null
  try {
    const res = await api.get('/api/tours')
    tours.value = res.data
  } catch (e) {
    error.value = 'Failed to load tours'
  } finally {
    loading.value = false
  }
}

fetchTours()

// expose method to parent
defineExpose({ fetchTours })
</script>
