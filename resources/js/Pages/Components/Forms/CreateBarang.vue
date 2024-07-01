<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
  
          <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-4">Tambah Barang</h2>
    <form @submit.prevent="submitForm">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Kode Barang</span>
          <input
            v-model="form.kode_barang"
            @input="form.kode_barang = $event.target.value"
            type="number"
            id="kode_barang"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Kode Barang"
            required
            autofocus
          />
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Nama Barang</span>
          <input
            v-model="form.nama_barang"
            @input="form.nama_barang = $event.target.value"
            type="text"
            id="nama_barang"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Nama Barang"
            required
          />
        </label>
        <label class="block text-sm" for="id_supplier">
          <span class="text-gray-700 dark:text-gray-400">ID Supplier</span>
          <select
            v-model="form.id_supplier"
            @input="form.id_supplier = $event.target.value"
            id="id_supplier"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-select"
          >
            <option value="">Pilih Supplier</option>
            <option value="1">Supplier A</option>
            <option value="2">Supplier B</option>
            <option value="3">Supplier C</option>
            <!-- Tambahkan opsi lain sesuai dengan daftar supplier yang Anda miliki -->
          </select>
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Harga Jual(Rp)</span>
          <input
            v-model="form.harga_jual"
            @input="form.harga_jual = $event.target.value"
            type="number"
            id="harga_jual"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Harga Jual"
            required
          />
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Harga Beli(Rp)</span>
          <input
            v-model="form.harga_beli"
            @input="form.harga_beli = $event.target.value"
            type="number"
            id="harga_beli"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Harga Beli"
            required
          />
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Stok</span>
          <input
            v-model="form.stok"
            @input="form.stok = $event.target.value"
            type="number"
            id="stok"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Stok"
            required
          />
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Satuan</span>
          <input
            v-model="form.satuan"
            @input="form.satuan = $event.target.value"
            type="text"
            id="satuan"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
            placeholder="Masukkan Satuan"
            required
          />
        </label>
      </div>
      <label class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
        <textarea
          v-model="form.keterangan"
          @input="form.keterangan = $event.target.value"
          id="keterangan"
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-textarea"
          rows="3"
          placeholder="Masukkan Keterangan"
        ></textarea>
      </label>
      <div class="flex justify-end mt-6">
        <button
          type="submit"
          class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition ease-in-out duration-300"
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

  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    kode_barang: '',
    nama_barang: '',
    id_supplier: '',
    harga_jual: '',
    harga_beli: '',
    stok: '',
    satuan: '',
    keterangan: '',
  });
  
  const submitForm = (e) => {
    e.preventDefault();
    form.post('/barang', {
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
  