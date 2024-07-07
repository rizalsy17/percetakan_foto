<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap space-x-1 justify-center mt-4">
      <template v-for="(link, key) in links" :key="key">
        <div v-if="link.url === null" class="mb-1 px-4 py-2 text-gray-400 text-sm leading-4 border rounded-lg bg-gray-100" v-html="link.label" />
        <Link v-else :href="link.url" class="pagination-link mb-1 px-4 py-2 text-sm leading-4 border rounded-lg transition duration-300 ease-in-out" :class="{ 'pagination-active': link.active, 'pagination-inactive': !link.active }" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
  components: {
    Link,
  },
  props: {
    links: {
      type: Array,
      required: true,
    },
  },
}
</script>

<style scoped>
.pagination-link {
  transition: all 0.3s ease;
}

.pagination-link:hover {
  transform: scale(1.05);
}

.pagination-active {
  background-color: #2563eb;
  color: #fff;
  border-color: #2563eb;
}

.pagination-inactive {
  background-color: #fff;
  color: #4a5568;
  border-color: #e2e8f0;
}

.pagination-inactive:hover {
  background-color: #ebf8ff;
  color: #2b6cb0;
  border-color: #bee3f8;
}
</style>
