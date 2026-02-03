<script setup>
import { ref, computed, onMounted } from 'vue';
import { getTours } from '@/services/api';
import TourForm from '@/components/TourForm.vue';
import TourTable from '@/components/TourTable.vue';

const tours = ref([]);
const searchQuery = ref('');
const loading = ref(false);
const error = ref(null);

const fetchTours = async () => {
  loading.value = true;
  error.value = null;
  try {
    tours.value = await getTours();
  } catch (err) {
    error.value = 'Failed to load tours';
    console.error(err);
  } finally {
    loading.value = false;
  }
};

const filteredTours = computed(() => {
  if (!searchQuery.value.trim()) return tours.value;

  const q = searchQuery.value.toLowerCase().trim();
  return tours.value.filter(tour =>
    tour.title?.toLowerCase().includes(q)
  );
});

const onTourCreated = () => {
  fetchTours();
};

onMounted(fetchTours);
</script>

<template>
  <div class="container my-5">
    <h1 class="mb-4">Tour Management</h1>

    <TourForm @tour-created="onTourCreated" />

    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Tours</h5>

        <div class="input-group" style="width: 300px;">
          <span class="input-group-text">
            <i class="bi bi-search"></i>
          </span>
          <input
            v-model="searchQuery"
            type="text"
            class="form-control"
            placeholder="Search by title..."
          />
        </div>
      </div>

      <div class="card-body p-0">
        <div v-if="loading" class="text-center py-5">
          <div class="spinner-border text-primary" role="status"></div>
          <p class="mt-2">Loading tours...</p>
        </div>

        <div v-else-if="error" class="alert alert-danger m-3">{{ error }}</div>

        <TourTable v-else :tours="filteredTours" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.card-header {
  background: #0d6efd;
  color: white;
}
</style>