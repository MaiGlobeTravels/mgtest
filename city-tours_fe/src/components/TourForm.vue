<template>
  <div style="margin-bottom:1rem">
    <h2>Create Tour</h2>
    <form @submit.prevent="submit">
      <div>
        <label>Title</label><br />
        <input v-model="form.title" />
          <div v-if="errors.title" style="color:red">{{ errors.title[0] }}</div>
      </div>
      <div>
        <label>Description</label><br />
        <textarea v-model="form.description"></textarea>
          <div v-if="errors.description" style="color:red">{{ errors.description[0] }}</div>
      </div>
      <div>
        <label>Price</label><br />
        <input v-model.number="form.price" type="number" step="0.01" />
          <div v-if="errors.price" style="color:red">{{ errors.price[0] }}</div>
      </div>
      <div>
        <label>Date</label><br />
        <input v-model="form.date" type="date" />
          <div v-if="errors.date" style="color:red">{{ errors.date[0] }}</div>
      </div>
      <button type="submit">Create</button>
        <div v-if="error && Object.keys(errors).length === 0" style="color:red">{{ error }}</div>
      
    </form>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import api from '../api/axios'

const form = reactive({ title: '', description: '', price: null, date: '' })
const error = ref(null)
const errors = ref({})

    const emit = defineEmits(['created'])

    async function submit() {
      error.value = null
      errors.value = {}
      try {
        await api.post('/api/tours', form)
        emit('created')
        form.title = ''
        form.description = ''
        form.price = null
        form.date = ''
      } catch (e) {
        error.value = e?.response?.data?.message || 'Failed to create tour'
        errors.value = e?.response?.data?.errors || {}
        console.log(errors.value);
      }
    }
</script>
