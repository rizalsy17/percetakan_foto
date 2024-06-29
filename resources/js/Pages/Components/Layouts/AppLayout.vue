<template>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
    <!-- Sidebar -->
    <Sidebar />

    <!-- Main content area -->
    <div class="flex flex-col flex-1 w-full overflow-hidden z-10 bg-white dark:bg-gray-800">
      <!-- Header component -->
      <Header />
      <div class="overflow-y-auto">
        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from './Sidebar.vue';
import Header from './Header.vue';

export default {
  components: {
    Sidebar,
    Header,
  },
};
</script>

<style scoped>
/* Additional styles as needed */
</style>

