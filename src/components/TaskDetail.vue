<template>
  <div class="container mt-4">
    <h2 class="mb-4">Task Details</h2>

    <div v-if="task" class="card">
      <div class="card-body">
        <h3 class="card-title">{{ task.title }}</h3>
        <p class="card-text">{{ task.description }}</p>
        <div class="d-flex justify-content-between">
          <button
            @click="markAsCompleted"
            :disabled="task.is_completed"
            class="btn btn-success"
          >
            Mark as Completed
          </button>
          <button
            @click="deleteTask"
            class="btn btn-danger"
          >
            Delete Task
          </button>
        </div>
        <router-link
          :to="{ name: 'TaskEdit', params: { id: task.id } }"
          class="btn btn-warning mt-3"
        >
          Edit Task
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from '../axios';

// Set base URL for Axios (Adjust this if your API runs on a different port)
axios.defaults.baseURL = 'http://localhost:8000/api/v1';

export default {
  data() {
    return {
      task: null
    };
  },
  async created() {
    this.fetchTask();
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
    async markAsCompleted() {
      try {
        await axios.patch(`/tasks/${this.task.id}/complete`);
        this.task.is_completed = true;
      } catch (error) {
        console.error('Error marking task as completed:', error);
      }
    },
    async deleteTask() {
      try {
        await axios.delete(`/tasks/${this.task.id}`);
        this.$router.push('/');
      } catch (error) {
        console.error('Error deleting task:', error);
      }
    }
  }
};
</script>


