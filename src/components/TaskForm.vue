<template>
  <div class="container mt-4">
    <h2 class="mb-4">Create Task</h2>
    <form @submit.prevent="createTask">
      <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" v-model="title" id="title" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea v-model="description" id="description" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      title: '',
      description: ''
    };
  },
  methods: {
    async createTask() {
      try {
        await axios.post('/tasks', { title: this.title, description: this.description });
        this.$router.push('/');
      } catch (error) {
        console.error('Error creating task:', error);
      }
    }
  }
};
</script>
