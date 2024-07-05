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
                  type="text"
                  id="kode_barang"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  readonly
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Barang</span>
                <input
                  v-model="form.nama_barang"
                  type="text"
                  id="nama_barang"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Nama Barang"
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
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga Jual (Rp)</span>
                <input
                  v-model="form.harga_jual"
                  type="number"
                  id="harga_jual"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Harga Jual"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Harga Beli (Rp)</span>
                <input
                  v-model="form.harga_beli"
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
                  type="number"
                  id="stok"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-500 focus:outline-none focus:ring focus:ring-purple-300 dark:text-gray-300 form-input"
                  placeholder="Masukkan Stok" value="0"
                  required
                  readonly
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Satuan</span>
                <input
                  v-model="form.satuan"
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
import { ref, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

const { props } = usePage();
const suppliers = ref(props.suppliers || []);

const form = useForm({
  kode_barang: '',
  nama_barang: '',
  id_supplier: '',
  harga_jual: '',
  harga_beli: '',
  stok: 0,
  satuan: '',
  keterangan: '',
});

// Function to generate random kode_barang
const generateKodeBarang = () => {
  const randomLetter = String.fromCharCode(65 + Math.floor(Math.random() * 26)); // Generate random letter A-Z
  const randomNumber = Math.floor(Math.random() * 900000) + 100000; // Generate random 6-digit number
  return `${randomLetter}-${randomNumber}`;
};

// Set the kode_barang when the component is mounted
onMounted(() => {
  form.kode_barang = generateKodeBarang();
});

const submitForm = () => {
  form.post('/barang', {
    onSuccess: () => {
      form.reset();
      form.kode_barang = generateKodeBarang(); // Generate new kode_barang after successful submission
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
/* Add any custom styles here if necessary */
</style>
