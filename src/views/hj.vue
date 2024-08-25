<template>
  <div>
    <h1>Task Management System</h1>
    <TaskList />
  </div>
</template>

<script>
import TaskList from '@/components/TaskList.vue';

export default {
  components: {
    TaskList
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
