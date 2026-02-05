<script setup lang="ts">
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { createTour } from '@/lib/api';

const title = ref('');
const description = ref('');
const price = ref<number | null>(null);
const date = ref('');
const saving = ref(false);

const submit = async () => {
	saving.value = true;
	try {
		const payload = {
			title: title.value,
			description: description.value,
			price: price.value,
			date: date.value,
		};
		const t = await createTour(payload);
		router.visit(`/tours/${t.id}`);
	} finally {
		saving.value = false;
	}
};
</script>

<template>
	<Head title="Add Tour" />
	<AppLayout>
		<div class="p-4 max-w-lg">
			<h2 class="text-lg mb-4">Add Tour</h2>
			<div class="space-y-2">
				<input v-model="title" placeholder="Title" class="border p-2 w-full" />
				<textarea v-model="description" placeholder="Description" class="border p-2 w-full" />
				<input v-model.number="price" placeholder="Price" class="border p-2 w-full" />
				<input v-model="date" type="date" class="border p-2 w-full" />
				<div class="flex gap-2">
					<button class="btn" :disabled="saving" @click="submit">Save</button>
					<Link href="/tours" class="btn">Cancel</Link>
				</div>
			</div>
		</div>
	</AppLayout>
</template>
