<template>
  <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-black mb-4">
      <a class="navbar-brand px-5 text-white" href="/">Task Manager</a>
      <div class="collapse navbar-collapse justify-content-end px-5">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item ">
            <router-link to="/" class="nav-link text-white">
              Home
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/create" class="nav-link text-white">
              Create Task
            </router-link>
          </li>
        </ul>
      </div>
    </nav>
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

