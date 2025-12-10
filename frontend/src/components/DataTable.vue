<template>
  <div>
    <h2>Data Table</h2>

    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
      <button class="add-btn" @click="$emit('open-form')">
        Add New Tour
      </button>

      <input
        type="text"
        v-model="search"
        placeholder="Search by title..."
        class="search-input"
      />
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Description</th>
          <th>Price</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="tour in filteredTours" :key="tour.id">
          <td>{{ tour.id }}</td>
          <td>{{ tour.title }}</td>
          <td>{{ tour.description }}</td>
          <td>{{ tour.price }}</td>
          <td>{{ tour.date }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "DataTable",
  emits: ["open-form"],
  data() {
    return {
      tours: [],
      search: "" 
    };
  },
  computed: {
    filteredTours() {
      if (!this.search) return this.tours;
      return this.tours.filter(tour =>
        tour.title.toLowerCase().includes(this.search.toLowerCase())
      );
    }
  },
  mounted() {
    this.fetchItems();
  },
  methods: {
    fetchItems() {
      axios
        .get("http://localhost:8000/api/tours")
        .then(response => {
          this.tours = response.data;
        })
        .catch(error => {
          console.error("Error fetching data:", error);
        });
    }
  }
};
</script>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

.add-btn {
  background-color: #42b983;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.add-btn:hover {
  background-color: #2e8b6f;
}

.search-input {
  padding: 8px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 200px;
}
</style>
