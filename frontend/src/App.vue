<template>
  <div id="app">

    <AddTourForm 
      v-if="showForm" 
      @saved="onSaved" 
      @cancel="showForm = false"
    />

    <DataTable 
      @open-form="showForm = true" 
      ref="table"
    />

  </div>
</template>

<script>
import DataTable from "./components/DataTable.vue";
import AddTourForm from "./components/AddTourForm.vue";

export default {
  name: "App",
  components: { DataTable, AddTourForm },

  data() {
    return {
      showForm: false
    };
  },

  methods: {
    onSaved() {
      this.showForm = false;
      this.$refs.table.fetchItems(); 
    }
  }
};
</script>
