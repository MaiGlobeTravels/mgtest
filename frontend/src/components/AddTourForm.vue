<template>
  <div class="form-container">
    <h2>Add New Tour</h2>

    <form @submit.prevent="saveTour">
      <div>
        <label>Title:</label>
        <input v-model="form.title" type="text" required>
      </div>

      <div>
        <label>Description:</label>
        <textarea v-model="form.description" required></textarea>
      </div>

      <div>
        <label>Price:</label>
        <input v-model="form.price" type="number" required>
      </div>

      <div>
        <label>Date:</label>
        <input v-model="form.date" type="date" required>
      </div>

      <button type="submit" class="save">Save</button>
      <button type="button" class="cancel" @click="$emit('cancel')">Cancel</button>
    </form>

    <p v-if="message">{{ message }}</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "AddTourForm",

  emits: ["saved", "cancel"],

  data() {
    return {
      form: {
        title: "",
        description: "",
        price: "",
        date: "",
      },
      message: ""
    };
  },

  methods: {
    saveTour() {
      axios.post("http://localhost:8000/api/save-tours", this.form)
        .then(() => {
          this.$emit("saved"); 
        })
        .catch(error => {
          this.message = "Error saving tour.";
          console.error(error);
        });
    }
  }
};
</script>

<style scoped>
.form-container {
  max-width: 400px;
  margin: 20px auto;
  background: #f7f7f7;
  padding: 20px;
  border-radius: 6px;
  text-align: left;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

form div {
  margin-bottom: 12px;
}

input, textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
}

.save {
  background: #42b983;
  color: white;
  padding: 10px 20px;
  border: none;
  margin-right: 10px;
  cursor: pointer;
}

.cancel {
  background: #aaa;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}
</style>
