<template>
  <div style="margin-bottom:1rem">
    <h2>Create Tour</h2>
    <form @submit.prevent="submit">
      <div>
        <label>Title</label><br />
        <input v-model="form.title" />
      </div>
      <div>
        <label>Description</label><br />
        <textarea v-model="form.description"></textarea>
      </div>
      <div>
        <label>Price</label><br />
        <input v-model.number="form.price" type="number" step="0.01" />
      </div>
      <div>
        <label>Date</label><br />
        <input v-model="form.date" type="date" />
      </div>
      <button type="submit">Create</button>
      <div v-if="error" style="color:red">{{ error }}</div>
    </form>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import api from '../api/axios'

const form = reactive({ title: '', description: '', price: null, date: '' })
const error = ref(null)

    const emit = defineEmits(['created'])

    async function submit() {
      error.value = null
      try {
        await api.post('/api/tours', form)
        emit('created')
        form.title = ''
        form.description = ''
        form.price = null
        form.date = ''
        alert('Tour created')
      } catch (e) {
        error.value = e?.response?.data?.message || 'Failed to create tour'
      }
    }
</script>
