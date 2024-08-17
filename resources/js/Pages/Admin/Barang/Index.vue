<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Barang
        </h2>
        <!-- Filter Bar -->
        <div class="mb-4 flex justify-between items-center">
          <div class="flex space-x-4">
   
  <div class="relative w-80">
    <input
    v-model="searchQuery"
    type="text"
    placeholder="Cari Barang..."
    class="block w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
  />
<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
    <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l4.25 4.26a1 1 0 11-1.42 1.42l-4.25-4.26zm-5.9-6.32a6 6 0 100 12 6 6 0 000-12z" clip-rule="evenodd" />
  </svg>
</div>
</div>
            <!-- Dropdown Filters -->
            <select
              v-model="sortOrder.field"
              class="block w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
            >
              <option value="">Pilih Urutan</option>
              <option value="created_at">Terbaru</option>
              <option value="harga_jual">Harga Jual</option>
              <option value="stok">Stok</option>
            </select>
            <!-- Order Filters -->
            <select
              v-model="sortOrder.order"
              class="block w-40 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800"
            >
              <option value="desc">Tertinggi</option>
              <option value="asc">Terendah</option>
            </select>
          </div>
          <!-- Search Input -->
       
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
      

        <!-- Tombol untuk menambah barang -->
     

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
                  v-for="(barang, index) in filteredBarangs"
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

        <!-- Modal for Delete Confirmation -->
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
      sortOrder: {
        field: '',
        order: 'desc'
      },
      searchQuery: '',
      showModal: false,
      deleteId: null,
    };
  },
  methods: {
    formatDate(date) {
      return new Date(date).toLocaleDateString('en-GB', {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
      });
    },
    checkLowStock(barang) {
      return barang.stok < 10; // Example threshold for low stock
    },
    showDeleteModal(barangId) {
      this.selectedBarangId = barangId;
      this.showModal = true;
    },
    deleteBarang() {
      this.$inertia.delete(`/barang/${this.selectedBarangId}`);
      this.showModal = false;
    },
  },
  computed: {
    filteredBarangs() {
      let filtered = [...this.barangs.data];

      // Filter based on search query
      if (this.searchQuery.trim() !== '') {
        const query = this.searchQuery.toLowerCase();
        filtered = filtered.filter(barang =>
          barang.nama_barang.toLowerCase().includes(query) ||
          barang.kode_barang.toLowerCase().includes(query)
        );
      }

      // Sort based on selected field and order
      if (this.sortOrder.field) {
        filtered.sort((a, b) => {
          const order = this.sortOrder.order === 'asc' ? 1 : -1;
          if (this.sortOrder.field === 'created_at') {
            return order * (new Date(a.created_at) - new Date(b.created_at));
          } else if (this.sortOrder.field === 'harga_jual') {
            return order * (a.harga_jual - b.harga_jual);
          } else if (this.sortOrder.field === 'stok') {
            return order * (a.stok - b.stok);
          }
          return 0;
        });
      }

      return filtered;
    }
  }
};
</script>

<style scoped>
/* Styling for table and filters */
</style>
