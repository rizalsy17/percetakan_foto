<template>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <Sidebar />
    <div class="flex flex-col flex-1 w-full  overflow-hidden z-10 bg-white dark:bg-gray-800">
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
  }
};
</script>

<style scoped>

</style>

