import { createRouter, createWebHistory } from 'vue-router'
import ToursView from '@/views/ToursView.vue'

const routes = [
  { path: '/', name: 'tours', component: ToursView },
  // add more routes later if needed
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router