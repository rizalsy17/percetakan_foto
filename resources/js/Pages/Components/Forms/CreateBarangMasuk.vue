<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Barang Masuk
          </h2>
  
          <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Kode Transaksi</span>
              <input
                v-model="form.kode_transaksi"
                @input="form.kode_transaksi = $event.target.value"
                type="text"
                id="kode_transaksi"
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder=""
                required
              />
            </label>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Tanggal Masuk</span>
              <input
                v-model="form.tanggal_masuk"
                @input="form.tanggal_masuk = $event.target.value"
                type="date"
                id="tanggal_masuk"
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder=""
                required
              />
            </label>
  
            <label class="block mt-4 text-sm" for="barang">
                    Nama Barang
                </label>
                <select
                    v-model="form.barang"
                    @input="form.barang = $event.target.value"
                    id="id_supplier"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                >
                    <option value="">Pilih Barang</option>
                    <option value="1">Bolpoin</option>
                    <option value="2">Pensil</option>
                </select>
  
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Jumlah</span>
              <input
                v-model="form.jumlah"
                @input="form.jumlah = $event.target.value"
                type="number"
                id="jumlah"
                          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Jumlah"
                required
              />
            </label>
  
            <label class="block mt-4 text-sm" for="supplier">
                    Supplier
                </label>
                <select
                    v-model="form.supplier"
                    @input="form.supplier = $event.target.value"
                    id="id_supplier"
                               class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                >
                    <option value="">Pilih Supplier</option>
                    <option value="1">Hasan</option>
                    <option value="2">Rehan</option>
                </select>
  
  
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
    kode_transaksi: '',
    tanggal_masuk: '',
    barang: '',
    jumlah: '',
    supplier: '',
  });
  
  const submitForm = (e) => {
    e.preventDefault();
    form.post('/barang-masuk', {
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
  