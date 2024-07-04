<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Alat
          </h2>
  
          <div v-if="alat" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form @submit.prevent="submitForm">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Kode Alat</span>
                <input
                  v-model="form.kode_alat"
                  type="text"
                  id="kode_alat"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  readonly
                  required
                />
                <div v-if="errors.kode_alat" class="text-red-500 text-sm mt-1">{{ errors.kode_alat }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Alat</span>
                <input
                  v-model="form.nama_alat"
                  type="text"
                  id="nama_alat"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Nama Alat"
                  required
                />
                <div v-if="errors.nama_alat" class="text-red-500 text-sm mt-1">{{ errors.nama_alat }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Stok</span>
                <input
                  v-model="form.stok"
                  type="number"
                  id="stok"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Stok"
                  required
                />
                <div v-if="errors.stok" class="text-red-500 text-sm mt-1">{{ errors.stok }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga</span>
                <input
                  v-model="form.harga"
                  type="number"
                  id="harga"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Harga"
                  required
                />
                <div v-if="errors.harga" class="text-red-500 text-sm mt-1">{{ errors.harga }}</div>
              </label>
  
              <label class="block text-sm" for="id_supplier">
                <span class="text-gray-700 dark:text-gray-400">Supplier</span>
                <select
                  v-model="form.id_supplier"
                  id="id_supplier"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-select"
                  required
                >
                  <option value="">Pilih Supplier</option>
                  <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">
                    {{ supplier.nama_supplier }}
                  </option>
                </select>
                <div v-if="errors.id_supplier" class="text-red-500 text-sm mt-1">{{ errors.id_supplier }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                <textarea
                  v-model="form.keterangan"
                  id="keterangan"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-textarea"
                  rows="3"
                  placeholder="Masukkan Keterangan"
                ></textarea>
                <div v-if="errors.keterangan" class="text-red-500 text-sm mt-1">{{ errors.keterangan }}</div>
              </label>
  
              <div class="flex justify-end mt-6">
                <button
                  type="submit"
                  class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                >
                  Simpan
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
  import AppLayout from '../../Layouts/AppLayout.vue';
  
  const props = defineProps(['alat', 'suppliers']);
  
  const form = useForm({
    kode_alat: props.alat ? props.alat.kode_alat : '',
    nama_alat: props.alat ? props.alat.nama_alat : '',
    stok: props.alat ? props.alat.stok : '',
    harga: props.alat ? props.alat.harga : '',
    id_supplier: props.alat ? props.alat.id_supplier : '',
    keterangan: props.alat ? props.alat.keterangan : ''
  });
  
  const errors = ref({});
  
  const submitForm = () => {
    form.put(`/alat-percetakan/${props.alat.id}`, {
      onError: (error) => {
        errors.value = error;
      },
    });
  };
  </script>
  
  <style>
  </style>
  