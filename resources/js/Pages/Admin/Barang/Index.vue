<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Barang
        </h2>
        <div class="mb-4 flex justify-between">
          <div class="flex space-x-4">
            <select
              v-model="sortOrder.created_at"
              class="block w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
            >
              <option value="created_at_desc">Terbaru</option>
              <option value="created_at_asc">Terlama</option>
            </select>
            <select
              v-model="sortOrder.harga_jual"
              class="block w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
            >
              <option value="harga_jual_desc">Harga Jual Tertinggi</option>
              <option value="harga_jual_asc">Harga Jual Terendah</option>
            </select>
            <select
              v-model="sortOrder.stok"
              class="block w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
            >
              <option value="stok_desc">Stok Tertinggi</option>
              <option value="stok_asc">Stok Terendah</option>
            </select>
          </div>
        </div>

        <!-- Tombol untuk menambah barang -->
        <div class="mb-4 flex justify-end">
          <Link :href="`/barang/create`">
            <button
              class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white bg-green-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
              <svg
                class="w-5 h-5 mr-2"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 5a1 1 0 00-1 1v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V6a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              Tambah Barang
            </button>
          </Link>
        </div>

        <!-- Daftar barang -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap bg-white border border-gray-300 shadow-lg rounded-lg overflow-hidden">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-purple-600">
                  <th class="px-4 py-3 border-b border-indigo-400">No</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Kode Barang</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Nama Barang</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Harga Jual</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Harga Beli</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Stok</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Tanggal Input</th>
                  <th class="px-4 py-3 border-b border-indigo-400">Aksi</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr
                  v-for="(barang, index) in sortedBarangs"
                  :key="barang.id"
                  class="text-gray-700"
                  :class="{ 'bg-red-100': checkLowStock(barang) }"
                >
                  <td class="px-4 py-3 text-sm">{{ (barangs.current_page - 1) * barangs.per_page + index + 1 }}</td>
                  <td class="px-4 py-3 text-sm">{{ barang.kode_barang }}</td>
                  <td class="px-4 py-3 text-sm">{{ barang.nama_barang }}</td>
                  <td class="px-4 py-3 text-sm">{{ barang.harga_jual }}</td>
                  <td class="px-4 py-3 text-sm">{{ barang.harga_beli }}</td>
                  <td class="px-4 py-3 text-sm">{{ barang.stok }}</td>
                  <td class="px-4 py-3 text-sm">{{ formatDate(barang.created_at) }}</td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <Link :href="`/barang/${barang.id}/edit`" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                          ></path>
                        </svg>
                      </Link>
                      <button
                        @click="showDeleteModal(barang.id)"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                      <span v-if="checkLowStock(barang)" class="text-red-500 font-extrabold">Low Stock</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <Pagination class="mt-6" :links="barangs.links" />
          </span>
        </div>

        <Modal
          :show="showModal"
          title="Hapus Barang"
          message="Anda yakin ingin menghapus barang ini?"
          @confirm="deleteBarang"
          @cancel="showModal = false"
        />
      </div>
    </main>
  </AppLayout>
</template>

<script>
import AppLayout from '../../Components/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Pagination from '../../Components/Layouts/Pagination.vue';
import Modal from '../../Components/Modal/Confirm.vue';

export default {
  components: {
    AppLayout,
    Link,
    Modal,
    Pagination,
  },
  props: {
    barangs: Object,
  },
  data() {
    return {
      isDropdownOpen: false,
      showModal: false,
      selectedBarangId: null,
      sortOrder: {
        created_at: 'created_at_desc', // default sorting
        harga_jual: 'harga_jual_desc',
        stok: 'stok_desc',
      },
    };
  },
  computed: {
    sortedBarangs() {
      let sorted = [...this.barangs.data];

      if (this.sortOrder.created_at) {
        sorted = sorted.sort((a, b) => {
          if (this.sortOrder.created_at === 'created_at_desc') {
            return new Date(b.created_at) - new Date(a.created_at);
          }
          return new Date(a.created_at) - new Date(b.created_at);
        });
      } else if (this.sortOrder.harga_jual) {
        sorted = sorted.sort((a, b) => {
          if (this.sortOrder.harga_jual === 'harga_jual_desc') {
            return b.harga_jual - a.harga_jual;
          }
          return a.harga_jual - b.harga_jual;
        });
      } else if (this.sortOrder.stok) {
        sorted = sorted.sort((a, b) => {
          if (this.sortOrder.stok === 'stok_desc') {
            return b.stok - a.stok;
          }
          return a.stok - b.stok;
        });
      }

      return sorted;
    },
  },
  methods: {
    showDeleteModal(barangId) {
      this.selectedBarangId = barangId;
      this.showModal = true;
    },
    deleteBarang() {
      this.$inertia.delete(`/barang/${this.selectedBarangId}`);
      this.showModal = false;
    },
    formatDate(dateString) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(dateString).toLocaleDateString('id-ID', options);
    },
    checkLowStock(barang) {
      return barang.stok < 10; // Example threshold for low stock
    },
  },
};
</script>

<style scoped>
table {
  border-collapse: separate;
  border-spacing: 0;
}

th {
  border-top: 1px solid #e2e8f0;
  border-bottom: 1px solid #e2e8f0;
}

td {
  border-bottom: 1px solid #e2e8f0;
}
</style>
