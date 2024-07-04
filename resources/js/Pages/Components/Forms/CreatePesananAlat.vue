<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Tambah Pesanan Alat
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <form @submit.prevent="submitForm">
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Kode Transaksi</span>
              <input
                v-model="form.kode_transaksi"
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
                type="date"
                id="tanggal_masuk"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder=""
                required
              />
            </label>

            <label class="block mt-4 text-sm" for="barang">
              <span class="text-gray-700 dark:text-gray-400">Nama Alat</span>
              <select
                v-model="form.alat_id"
                id="alat"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-select"
                required
              >
                <option value="">Pilih Alat</option>
                <option v-for="(nama_alat, id) in alatpercetakans" :key="id" :value="id">
                  {{ nama_alat }}
                </option>
              </select>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Jumlah</span>
              <input
                v-model="form.jumlah"
                type="number"
                id="jumlah"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                placeholder="Masukkan Jumlah"
                required
              />
            </label>

            <label class="block mt-4 text-sm" for="supplier">
              <span class="text-gray-700 dark:text-gray-400">Supplier</span>
              <select
                v-model="form.supplier_id"
                id="id_supplier"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-select"
                required
              >
                <option value="">Pilih Supplier</option>
                <option v-for="(nama_supplier, id) in suppliers" :key="id" :value="id">
                  {{ nama_supplier }}
                </option>
              </select>
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
import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps(['suppliers', 'alatpercetakans']);

const form = useForm({
  kode_transaksi: '',
  tanggal_masuk: '',
  alat_id: '',
  jumlah: '',
  supplier_id: '',
});

const generateKodeTransaksiAlatPercetakan = () => {
  const randomLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26)); // Generate random letter A-Z
  const randomNumber = Math.floor(Math.random() * 900000) + 100000; // Generate random 6-digit number
  return `${randomLetter}-${randomNumber}`;
};

// Set the kode_barang when the component is mounted
onMounted(() => {
  form.kode_transaksi = generateKodeTransaksiAlatPercetakan();
});


const submitForm = () => {
  form.post('/pesanan-alat', {
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

<style>
/* Add any necessary styles here */
</style>
