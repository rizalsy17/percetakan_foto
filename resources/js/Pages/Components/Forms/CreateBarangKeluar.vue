<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Tambah Barang Keluar
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
                readonly
                required
              />
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Tanggal Keluar</span>
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
              <span class="text-gray-700 dark:text-gray-400">Nama Barang</span>
              <select
                v-model="form.barang_id"
                id="barang"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-select"
                required
              >
                <option value="">Pilih Barang</option>
                <option v-for="(nama_barang, id) in barangs" :key="id" :value="id">
                  {{ nama_barang }}
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
              <span v-if="form.errors.jumlah" class="text-red-500 text-sm mt-1 block">{{ form.errors.jumlah }}</span>
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
import { onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps(['barangs']);

const form = useForm({
  kode_transaksi: '',
  tanggal_masuk: '',
  barang_id: '',
  jumlah: '',
  type: 'keluar',
  supplier_id: null,
});

const generateKodeTransaksiBarangKeluar = () => {
  const randomLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26)); // Generate random letter A-Z
  const randomNumber = Math.floor(Math.random() * 900000) + 100000; // Generate random 6-digit number
  return `${randomLetter}-${randomNumber}`;
};

onMounted(() => {
  form.kode_transaksi = generateKodeTransaksiBarangKeluar();
});

const submitForm = () => {
  form.post('/barang-keluar', {
    onSuccess: () => {
      form.reset();
    },
    onError: () => {
      // Scroll to the first error field
      const errorField = document.querySelector('.text-red-500');
      if (errorField) {
        errorField.scrollIntoView({ behavior: 'smooth' });
      }
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
