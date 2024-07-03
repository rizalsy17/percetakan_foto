<template>
    <div
      v-if="show"
      class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-900 bg-opacity-50"
    >
      <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <div class="px-6 py-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
          {{ title }}
        </div>
        <div class="px-6 py-4 text-gray-700 dark:text-gray-400">
          {{ message }}
        </div>
        <div class="flex justify-end px-6 py-4">
          <button
            @click="onCancel"
            class="px-4 py-2 mr-2 text-gray-700 bg-gray-300 rounded-lg dark:bg-gray-600 dark:text-gray-300"
          >
            Cancel
          </button>
          <button
            @click="onConfirm"
            class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      show: {
        type: Boolean,
        required: true,
      },
      title: {
        type: String,
        required: true,
      },
      message: {
        type: String,
        required: true,
      },
    },
    emits: ['confirm', 'cancel'],
    methods: {
      onConfirm() {
        this.$emit('confirm');
      },
      onCancel() {
        this.$emit('cancel');
      },
    },
  };
  </script>
  