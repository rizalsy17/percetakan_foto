<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Barang
          </h2>
  
          <div v-if="barang" class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form @submit.prevent="submitForm">
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Kode Barang</span>
                <input
                  v-model="form.kode_barang"
                  type="text"
                  id="kode_barang"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  readonly
                  required
                />
                <div v-if="errors.kode_barang" class="text-red-500 text-sm mt-1">{{ errors.kode_barang }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Barang</span>
                <input
                  v-model="form.nama_barang"
                  type="text"
                  id="nama_barang"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Nama Barang"
                  required
                />
                <div v-if="errors.nama_barang" class="text-red-500 text-sm mt-1">{{ errors.nama_barang }}</div>
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
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga Jual (Rp)</span>
                <input
                  v-model="form.harga_jual"
                  type="number"
                  id="harga_jual"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Harga Jual"
                  required
                />
                <div v-if="errors.harga_jual" class="text-red-500 text-sm mt-1">{{ errors.harga_jual }}</div>
              </label>
  
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga Beli (Rp)</span>
                <input
                  v-model="form.harga_beli"
                  type="number"
                  id="harga_beli"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Harga Beli"
                  required
                />
                <div v-if="errors.harga_beli" class="text-red-500 text-sm mt-1">{{ errors.harga_beli }}</div>
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
                <span class="text-gray-700 dark:text-gray-400">Satuan</span>
                <input
                  v-model="form.satuan"
                  type="text"
                  id="satuan"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Satuan"
                  required
                />
                <div v-if="errors.satuan" class="text-red-500 text-sm mt-1">{{ errors.satuan }}</div>
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
  
  const props = defineProps(['barang', 'suppliers']);
  
  const form = useForm({
    kode_barang: props.barang ? props.barang.kode_barang : '',
    nama_barang: props.barang ? props.barang.nama_barang : '',
    id_supplier: props.barang ? props.barang.id_supplier : '',
    harga_jual:  props.barang ? props.barang.harga_jual : '',
    harga_beli:  props.barang ? props.barang.harga_beli : '',
    stok:  props.barang ? props.barang.stok : '',
    satuan: props.barang ? props.barang.satuan : '',
    keterangan: props.barang ? props.barang.keterangan : ''
  });
  
  const errors = ref({});
  
  // Method to handle form submission
  const submitForm = () => {
    form.put(`/barang/${props.barang.id}`, {
      onError: (error) => {
        errors.value = error;
      },
    });
  };
  </script>
  
  <style>
  </style>
  