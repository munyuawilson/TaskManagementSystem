<!-- src/views/TaskView.vue -->

<template>
    <div v-if="task">
        <h2>Task Details</h2>
        <div>
            <h3>{{ task.title }}</h3>
            <p>{{ task.description }}</p>
            <p>Status: {{ task.is_completed ? 'Completed' : 'Incomplete' }}</p>
            <button @click="markAsComplete" :disabled="task.is_completed">Mark as Completed</button>
            <button @click="deleteTask">Delete Task</button>
            <router-link :to="{ name: 'TaskEdit', params: { id: task.id } }">Edit Task</router-link>
        </div>
    </div>
</template>

<script>
import axios from '../axios';

export default {
    data() {
        return {
            task: null
        };
    },
    created() {
        this.fetchTask();
    },
    methods: {
        async fetchTask() {
            try {
                const response = await axios.get(`tasks/${this.$route.params.id}`);
                this.task = response.data.data;
            } catch (error) {
                console.error('Error fetching task:', error);
            }
        },
        async markAsComplete() {
            try {
                await axios.patch(`tasks/${this.$route.params.id}/complete`);
                this.task.is_completed = true; // Update the local state
            } catch (error) {
                console.error('Error marking task as completed:', error);
            }
        },
        async deleteTask() {
            try {
                await axios.delete(`tasks/${this.$route.params.id}`);
                this.$router.push('/');
            } catch (error) {
                console.error('Error deleting task:', error);
            }
        }
    }
};
</script>
