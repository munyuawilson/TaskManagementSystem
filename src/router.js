import { createRouter, createWebHistory } from 'vue-router';
import TaskList from './components/TaskList.vue';
import TaskForm from './components/TaskForm.vue';
import TaskDetail from './components/TaskDetail.vue';
import TaskEdit from './components/TaskEdit.vue';

const routes = [
    { path: '/', component: TaskList },
    { path: '/create', component: TaskForm },
    { path: '/tasks/:id', name: 'TaskView', component: TaskDetail },
    { path: '/tasks/:id/edit', name: 'TaskEdit', component: TaskEdit }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
