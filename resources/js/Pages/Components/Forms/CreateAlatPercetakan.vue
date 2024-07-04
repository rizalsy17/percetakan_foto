<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Tambah Alat
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <form @submit.prevent="submitForm">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Kode Alat</span>
              <input
                v-model="form.kode_alat"
                type="text"
                id="kode_alat"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Kode Alat"
                readonly
                required
              />
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
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Stok</span>
              <input
                v-model="form.stok"
                type="number"
                id="jumlah"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Stok"
                required
              />
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
              <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
              <textarea
                v-model="form.keterangan"
                id="keterangan"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
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
import { ref, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';

const { props } = usePage();
const suppliers = ref(props.suppliers || []);

const form = useForm({
  kode_alat: '',
  nama_alat: '',
  stok: '',
  harga: '',
  id_supplier: '',
  keterangan: '',
});

const generateKodeAlat = () => {
  const randomLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26)); // Generate random letter A-Z
  const randomNumber = Math.floor(Math.random() * 900000) + 100000; // Generate random 6-digit number
  return `${randomLetter}-${randomNumber}`;
};

onMounted(() => {
  form.kode_alat = generateKodeAlat();
});

const submitForm = () => {
  form.post('/alat-percetakan', {
    onSuccess: () => {
      form.reset();
      form.kode_alat = generateKodeAlat();
    },
  });
};
</script>

<style>
/* Add any necessary styles here */
</style>
