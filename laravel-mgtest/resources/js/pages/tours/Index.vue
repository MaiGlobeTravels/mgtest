<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { listTours, type Tour } from '@/lib/api';
import { dashboard } from '@/routes';

const tours = ref<Tour[]>([]);
const loading = ref(false);
const busyReport = ref(false);

const load = async () => {
	loading.value = true;
	try {
		tours.value = await listTours();
	} finally {
		loading.value = false;
	}
};

onMounted(load);
</script>

<template>
	<Head title="Tours" />

	<AppLayout>
		<div class="p-4">
			<div class="flex items-center justify-between mb-4">
				<h2 class="text-lg font-medium">Tours</h2>
			</div>

			<div v-if="loading">Loading...</div>
			<div v-else>
				<table class="w-full table-auto">
					<thead>
						<tr>
							<th class="text-left">Title</th>
							<th class="text-left">Date</th>
							<th class="text-left">Price</th>
							<th />
						</tr>
					</thead>
					<tbody>
						<tr v-for="t in tours" :key="t.id" class="border-t">
							<td>{{ t.title }}</td>
							<td>{{ t.date }}</td>
							<td>{{ t.price }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</AppLayout>
</template>
