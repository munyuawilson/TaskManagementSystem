<template>
  <div class="container mt-4">
    <h2 class="mb-4">Task List</h2>
    <div class="mb-3">
      <input
        type="text"
        v-model="searchTerm"
        @input="searchTasks"
        class="form-control"
        placeholder="Search tasks..."
      />
    </div>
    <ul class="list-group mb-4">
      <li
        v-for="task in tasks.data"
        :key="task.id"
        class="list-group-item d-flex justify-content-between align-items-center"
      >
        <router-link :to="{ name: 'TaskView', params: { id: task.id } }" class="btn btn-link">
          {{ task.title }}
        </router-link>
        <button
          @click="deleteTask(task.id)"
          class="btn btn-danger btn-sm"
        >
          Delete
        </button>
      </li>
    </ul>
    <div v-if="tasks.last_page > 1" class="d-flex justify-content-between">
      <button
        @click="changePage(tasks.current_page - 1)"
        :disabled="tasks.current_page <= 1"
        class="btn btn-secondary"
      >
        Previous
      </button>
      <span>
        Page {{ tasks.current_page }} of {{ tasks.last_page }}
      </span>
      <button
        @click="changePage(tasks.current_page + 1)"
        :disabled="tasks.current_page >= tasks.last_page"
        class="btn btn-secondary"
      >
        Next
      </button>
    </div>
    <div class="mt-4">
      <router-link to="/create" class="btn btn-primary">
        Create Task
      </router-link>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

// Set base URL for Axios (Adjust this if your API runs on a different port)
axios.defaults.baseURL = 'http://localhost:8000/api/v1';

export default {
  data() {
    return {
      tasks: {
        data: [],
        current_page: 1,
        last_page: 1
      },
      searchTerm: ''
    };
  },
  created() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks(page = 1) {
      try {
        const response = await axios.get('/tasks', {
          params: {
            page: page,
            search: this.searchTerm
          }
        });
        this.tasks = response.data;
      } catch (error) {
        console.error('Error fetching tasks:', error);
      }
    },
    async searchTasks() {
      this.fetchTasks(); // Fetch tasks with updated search term
    },
    changePage(page) {
      if (page >= 1 && page <= this.tasks.last_page) {
        this.fetchTasks(page);
      }
    },
    async deleteTask(id) {
      try {
        await axios.delete(`/tasks/${id}`);
        this.fetchTasks(this.tasks.current_page); // Refresh current page
      } catch (error) {
        console.error('Error deleting task:', error);
      }
    }
  }
};
</script>
