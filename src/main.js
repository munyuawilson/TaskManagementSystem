import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';



axios.defaults.baseURL = 'http://localhost:8000/api/v1';

const app = createApp(App);

app.use(router);
app.mount('#app');
