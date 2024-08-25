<template>
  <div class="container mt-4">
    <h2 class="mb-4">Edit Task</h2>

    <div v-if="task" class="card">
      <div class="card-body">
        <form @submit.prevent="updateTask">
          <div class="form-group">
            <label for="title">Title:</label>
            <input
              type="text"
              id="title"
              v-model="title"
              class="form-control"
              required
            />
          </div>

          <div class="form-group mt-3">
            <label for="description">Description:</label>
            <textarea
              id="description"
              v-model="description"
              class="form-control"
              rows="4"
            ></textarea>
          </div>

          <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Task</button>
            <router-link to="/" class="btn btn-secondary ml-2">Cancel</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      task: null,
      title: '',
      description: ''
    };
  },
  async created() {
    await this.fetchTask();
    this.title = this.task.title;
    this.description = this.task.description;
  },
  methods: {
    async fetchTask() {
      try {
        const response = await axios.get(`/tasks/${this.$route.params.id}`);
        this.task = response.data.data;
      } catch (error) {
        console.error('Error fetching task:', error);
      }
    },
    async updateTask() {
      try {
        await axios.put(`/tasks/${this.task.id}`, {
          title: this.title,
          description: this.description
        });
        this.$router.push('/');
      } catch (error) {
        console.error('Error updating task:', error);
      }
    }
  }
};
</script>


