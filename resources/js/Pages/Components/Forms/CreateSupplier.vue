<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Supplier
          </h2>
  
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nama Supplier</span>
              <input
                v-model="form.nama_supplier"
                @input="form.nama_supplier = $event.target.value"
                type="text"
                id="nama_supplier"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Masukkan Nama Supplier"
                required
              />
            </label>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Perusahaan</span>
              <input
                v-model="form.perusahaan"
                @input="form.perusahaan = $event.target.value"
                type="text"
                id="perusahaan"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Nama Perusahaan"
                required
              />
            </label>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Telepon</span>
              <input
                v-model="form.telepon"
                @input="form.telepon = $event.target.value"
                type="number"
                id="telepon"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Masukkan No.Telepon"
                required
              />
            </label>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Domisili</span>
              <input
                v-model="form.domisili"
                @input="form.domisili = $event.target.value"
                type="text"
                id="domisili"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Masukkan Domisili"
                required
              />
            </label>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Alamat</span>
              <input
                v-model="form.alamat"
                @input="form.alamat = $event.target.value"
                type="text"
                id="alamat"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Masukkan Alamat"
                required
              />
            </label>
  
            <div class="flex justify-end mt-6">
              <button
                type="submit"
                @click.prevent="submitForm"
                class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              >
                Tambah
              </button>
            </div>
          </div>
        </div>
      </main>
    </AppLayout>
  </template>
  
  <script setup>

  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    nama_supplier: '',
    perusahaan: '',
    telepon: '',
    domisili: '',
    alamat: '',
  });
  
  const submitForm = (e) => {
    e.preventDefault();
    form.post('/supplier', {
      onSuccess: () => {
        form.reset();
        alert('Barang berhasil ditambahkan!');
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

  <style>
  </style>
  