<script setup>
import { ref } from 'vue';
import { createTour } from '@/services/api';

const emit = defineEmits(['tour-created']);

const form = ref({
  title: '',
  description: '',
  price: '',
  duration: '',
});

const loading = ref(false);
const error = ref(null);

const resetForm = () => {
  form.value = { title: '', description: '', price: '', duration: '' };
};

const submitTour = async () => {
  if (!form.value.title.trim()) {
    error.value = 'Title is required';
    return;
  }

  loading.value = true;
  error.value = null;

  try {
    await createTour({
      ...form.value,
      price: Number(form.value.price) || 0,
      duration: Number(form.value.duration) || 0,
    });
    emit('tour-created');
    resetForm();
  } catch (err) {
    error.value = err.response?.data?.message || 'Failed to create tour';
    console.error(err);
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <div class="tour-form card p-4 mb-4">
    <h3 class="mb-3">Add New Tour</h3>

    <form @submit.prevent="submitTour">
      <div class="mb-3">
        <label class="form-label">Title *</label>
        <input
          v-model="form.title"
          type="text"
          class="form-control"
          placeholder="e.g. Northern Lights Adventure"
          required
        />
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea
          v-model="form.description"
          class="form-control"
          rows="3"
          placeholder="Short description of the tour..."
        ></textarea>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Price ($)</label>
          <input
            v-model.number="form.price"
            type="number"
            min="0"
            step="0.01"
            class="form-control"
            placeholder="199.99"
          />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Duration (days)</label>
          <input
            v-model.number="form.duration"
            type="number"
            min="1"
            class="form-control"
            placeholder="7"
          />
        </div>
      </div>

      <div v-if="error" class="alert alert-danger">{{ error }}</div>

      <button
        type="submit"
        class="btn btn-primary"
        :disabled="loading || !form.title.trim()"
      >
        <span v-if="loading" class="spinner-border spinner-border-sm me-2"></span>
        {{ loading ? 'Creating...' : 'Add Tour' }}
      </button>
    </form>
  </div>
</template>

<style scoped>
.tour-form {
  background: #f8f9fa;
  border: 1px solid #dee2e6;
}
</style>