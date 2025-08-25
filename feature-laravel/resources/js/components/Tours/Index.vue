<template>
  <h2 class="text-lg font-semibold">Tours</h2>

  <table class="mt-4 border border-1">
    <thead class="border border-1 bg-gray-100">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody class="border border-1 bg-gray-50">
      <tr v-for="tour in tours" :key="tour.id">
        <td>{{ tour.id }}</td>
        <td>{{ tour.title }}</td>
        <td>{{ tour.description }}</td>
        <td>{{ tour.price }}</td>
        <td>{{ tour.date }}</td>
      </tr>
    </tbody>
  </table>

 <h2 class="text-lg font-semibold mt-4 mb-3">Create a New Tour</h2>
    <form @submit.prevent="createTour()">
        <div>
            <label for="title">Title:</label><br/>
            <input class="border border-1" v-model="tour.title" type="text" id="title" name="title" /><br/>
        </div>
        <div>
            <label for="description">Description:</label><br/>
            <textarea class="border border-1" v-model="tour.description" id="description" name="description"></textarea>
        </div>
        <div>
            <label for="price">Price:</label><br/>
            <input class="border border-1" v-model="tour.price" type="number" id="price" name="price" step="0.01" />
        </div>
        <div>
            <label for="date">Date:</label><br/>
            <input class="border border-1" v-model="tour.date" type="date" id="date" name="date" />
        </div>
        <button class="btn bg-gray-300 p-3 mt-3" type="submit">Create Tour</button>
    </form>
</template>
<script>
    export default {
        name: "ToursIndex",
        data() {
            return {
                tours: [],
                tour: {
                    title: '',
                    description: '',
                    price: 0,
                    date: ''
                }
            }
        },
        mounted() {
            axios.get('/api/tours')
                .then(response => {
                    this.tours = response.data.data;
                });
        },
        methods: {
            createTour() {
                const formData = new FormData();
                formData.append('title', this.tour.title);
                formData.append('description', this.tour.description);
                formData.append('price', this.tour.price);
                formData.append('date', this.tour.date);

                console.log('Creating tour with data:', this.tour);

                axios.post('/api/tours', formData)
                    .then(response => {
                        console.log(response.data);
                        this.tours.push(response.data.data);
                    });
            }
        }
      }
</script>
