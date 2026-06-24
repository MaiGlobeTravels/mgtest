<template>
  <div>
    <h2>All Tours</h2>
    
    <table class="tours-table" style="border-collapse: collapse; width: 100%;">

      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="tour in tours" :key="tour.id">
          <td>{{ tour.title }}</td>
          <td>{{ tour.description }}</td>
          <td>${{ tour.price.toFixed(2) }}</td>
          <td>{{ tour.date }}</td>
        </tr>
      </tbody>
    </table>
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

<style scoped>
.tours-table, .tours-table th, .tours-table td {
  border: 1px solid #ddd;
}
.tours-table th, .tours-table td {
  padding: 8px;
  text-align: left;
}
.tours-table th {
  background: #f2f2f2;
}
</style>
