<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Tambah Supplier
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <form @submit.prevent="submitForm">
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nama Supplier</span>
              <input
                v-model="form.nama_supplier"
                type="text"
                id="nama_supplier"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Nama Supplier"
                required
              />
              <div v-if="errors.nama_supplier" class="text-red-500 text-sm mt-1">{{ errors.nama_supplier }}</div>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Perusahaan</span>
              <input
                v-model="form.perusahaan"
                type="text"
                id="perusahaan"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Nama Perusahaan"
                required
              />
              <div v-if="errors.perusahaan" class="text-red-500 text-sm mt-1">{{ errors.perusahaan }}</div>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Telepon</span>
              <input
                v-model="form.telepon"
                type="text"
                id="telepon"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan No. Telepon"
                required
              />
              <div v-if="errors.telepon" class="text-red-500 text-sm mt-1">{{ errors.telepon }}</div>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Domisili</span>
              <input
                v-model="form.domisili"
                type="text"
                id="domisili"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Domisili"
                required
              />
              <div v-if="errors.domisili" class="text-red-500 text-sm mt-1">{{ errors.domisili }}</div>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Alamat</span>
              <input
                v-model="form.alamat"
                type="text"
                id="alamat"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Alamat"
                required
              />
              <div v-if="errors.alamat" class="text-red-500 text-sm mt-1">{{ errors.alamat }}</div>
            </label>

            <div class="flex justify-end mt-6">
              <button
                type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              >
                Tambah
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  nama_supplier: '',
  perusahaan: '',
  telepon: '',
  domisili: '',
  alamat: '',
});

const errors = ref({});

const submitForm = () => {
  form.post('/supplier', {
    onError: (error) => {
      errors.value = error;
    },
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<script>
import AppLayout from '../Layouts/AppLayout.vue';

export default {
  components: {
    AppLayout,
  },
};
</script>
