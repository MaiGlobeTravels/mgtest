<script setup>
defineProps({
  tours: {
    type: Array,
    required: true,
    default: () => [],
  },
});
</script>

<template>
  <div class="table-responsive">
    <table class="table table-hover table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Duration</th>
          <th>Created</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="tours.length === 0">
          <td colspan="5" class="text-center text-muted py-4">
            No tours found
          </td>
        </tr>
        <tr v-else v-for="tour in tours" :key="tour.id">
          <td class="fw-bold">{{ tour.title }}</td>
          <td>{{ tour.description || '—' }}</td>
          <td>${{ tour.price?.toFixed(2) || '0.00' }}</td>
          <td>{{ tour.duration || '—' }} days</td>
          <td>
            <small class="text-muted">
              {{ tour.createdAt ? new Date(tour.createdAt).toLocaleDateString() : '—' }}
            </small>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>