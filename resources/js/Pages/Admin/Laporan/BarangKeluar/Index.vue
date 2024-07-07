<template>
  <AppLayout>
      <main class="h-full overflow-y-auto">
          <div class="container mx-auto px-6 py-8">
              <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                  Laporan Barang Keluar
              </h2>

              <!-- Form untuk pilih tanggal start dan end -->
              <div class="flex items-center mb-6">
                  <label for="start-date" class="block text-sm font-medium text-gray-700 mr-2">Start Date:</label>
                  <input type="date" v-model="startDate" id="start-date" class="block w-1/4 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
                  <label for="end-date" class="block text-sm font-medium text-gray-700 ml-4 mr-2">End Date:</label>
                  <input type="date" v-model="endDate" id="end-date" class="block w-1/4 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
                  <button @click="exportPdf" class="ml-4 px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      Export PDF
                  </button>

                  <button @click="exportExcel" class="ml-4 px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                      Export Excel
                  </button>
              </div>

              <!-- Daftar barang -->
              <div class="w-full overflow-hidden rounded-lg shadow-xs">
                  <div class="w-full overflow-x-auto">
                      <table class="w-full whitespace-no-wrap bg-white border border-gray-300">
                          <thead>
                              <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-purple-600">
                                  <th class="px-4 py-3">Kode Transaksi</th>
                                  <th class="px-4 py-3">Tanggal Keluar</th>
                                  <th class="px-4 py-3">Barang</th>
                                  <th class="px-4 py-3">Jumlah Masuk</th>
                                  <th class="px-4 py-3">User</th>
                                  <th class="px-4 py-3">Type</th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                              <tr v-for="transaksi in transaksis.data" :key="transaksi.id" class="text-gray-700 dark:text-gray-400">
                                  <td class="px-4 py-3 text-sm">{{ transaksi.kode_transaksi }}</td>
                                  <td class="px-4 py-3 text-sm">{{ formatDate(transaksi.tanggal_masuk) }}</td>
                                  <td class="px-4 py-3 text-sm">{{ transaksi.barang.nama_barang }}</td>
                                  <td class="px-4 py-3 text-sm">{{ transaksi.jumlah }}</td>
                                  <td class="px-4 py-3 text-sm">{{ transaksi.user.name }}</td>
                                  <td class="px-4 py-3 text-sm">{{ transaksi.type }}</td>
                                  <!-- <td class="px-4 py-3 text-sm">{{ formatDate(transaksi.created_at) }}</td> -->
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                      <span class="flex items-center col-span-3">
                          Showing {{ transaksis.from }}-{{ transaksis.to }} of {{ transaksis.total }}
                      </span>
                      <span class="col-span-2"></span>
                      <!-- Pagination -->
                      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                          <nav aria-label="Table navigation">
                              <ul class="inline-flex items-center">
                                  <li>
                                      <button @click="previousPage" :disabled="!transaksis.prev_page_url"
                                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                          aria-label="Previous">
                                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                              <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                  clip-rule="evenodd" fill-rule="evenodd"></path>
                                          </svg>
                                      </button>
                                  </li>
                                  <li v-for="page in pages" :key="page" @click="changePage(page)"
                                      :class="{'bg-purple-600 text-white': page === transaksis.current_page}"
                                      class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                      {{ page }}
                                  </li>
                                  <li>
                                      <button @click="nextPage" :disabled="!transaksis.next_page_url"
                                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                          aria-label="Next">
                                          <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                              <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 01-1.414 0z"
                                                  clip-rule="evenodd" fill-rule="evenodd"></path>
                                          </svg>
                                      </button>
                                  </li>
                              </ul>
                          </nav>
                      </span>
                  </div>
              </div>
          </div>
      </main>
  </AppLayout>
</template>

<script>
import AppLayout from '../../../Components/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
      AppLayout,
      Link,
  },
  props: {
      transaksis: Object,
  },
  data() {
      return {
          startDate: '',
          endDate: ''
      };
  },
  methods: {
    formatDate(dateString) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(dateString).toLocaleDateString('id-ID', options);
    },
      previousPage() {
          if (this.transaksis.prev_page_url) {
              this.$inertia.get(this.transaksis.prev_page_url);
          }
      },
      nextPage() {
          if (this.transaksis.next_page_url) {
              this.$inertia.get(this.transaksis.next_page_url);
          }
      },
      changePage(page) {
          this.$inertia.get(this.transaksis.path + '?page=' + page);
      },
      exportPdf() {
          const params = {
              start_date: this.startDate,
              end_date: this.endDate
          };
          const queryString = new URLSearchParams(params).toString();
          window.open('/download-laporan-keluar?' + queryString, '_blank');
      },
      exportExcel() {
          const params = {
              start_date: this.startDate,
              end_date: this.endDate
          };
          const queryString = new URLSearchParams(params).toString();
          window.open('/download-excel-keluar?' + queryString, '_blank');
      }
  },
  computed: {
      pages() {
          let pages = [];
          for (let i = 1; i <= this.transaksis.last_page; i++) {
              pages.push(i);
          }
          return pages;
      }
  }
};
</script>

<style>

</style>
