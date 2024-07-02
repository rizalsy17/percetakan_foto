<template>
    <nav aria-label="Pagination">
      <ul class="inline-flex items-center -space-x-px">
        <li v-for="link in links" :key="link.url" :class="{ 'is-active': link.active }">
          <inertia-link
            v-if="link.url"
            :href="link.url"
            v-html="link.label"
            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            :class="{ 'text-blue-600 border-blue-300 bg-blue-50': link.active }"
          ></inertia-link>
          <span
            v-else
            v-html="link.label"
            class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
          ></span>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    props: {
      links: {
        type: Array,
        required: true
      }
    }
  }
  </script>
  
  <style>
  .is-active a {
    color: #2563eb;
    border-color: #2563eb;
  }
  </style>
  