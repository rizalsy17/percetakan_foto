<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Barang
        </h2>
        
        <!-- Dropdown Button -->
        <div class="mb-4 flex justify-between relative">
          <div class="relative">
            <button
              id="dropdownRadioButton"
              @click="toggleDropdown"
              class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
              type="button"
            >
              <svg
                class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"
                />
              </svg>
              Last 30 days
              <svg
                class="w-2.5 h-2.5 ms-2.5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 10 6"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m1 1 4 4 4-4"
                />
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              v-show="isDropdownOpen"
              class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 absolute"
              style="top: 40px; left: 0;"
            >
              <ul
                class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownRadioButton"
              >
                <li>
                  <div
                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    <input
                      id="filter-radio-example-1"
                      type="radio"
                      value=""
                      name="filter-radio"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      @change="closeDropdown"
                    />
                    <label
                      for="filter-radio-example-1"
                      class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"
                      >Last day</label
                    >
                  </div>
                </li>
                <li>
                  <div
                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    <input
                      checked=""
                      id="filter-radio-example-2"
                      type="radio"
                      value=""
                      name="filter-radio"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      @change="closeDropdown"
                    />
                    <label
                      for="filter-radio-example-2"
                      class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"
                      >Last 7 days</label
                    >
                  </div>
                </li>
                <li>
                  <div
                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    <input
                      id="filter-radio-example-3"
                      type="radio"
                      value=""
                      name="filter-radio"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      @change="closeDropdown"
                    />
                    <label
                      for="filter-radio-example-3"
                      class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"
                      >Last 30 days</label
                    >
                  </div>
                </li>
                <li>
                  <div
                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    <input
                      id="filter-radio-example-4"
                      type="radio"
                      value=""
                      name="filter-radio"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      @change="closeDropdown"
                    />
                    <label
                      for="filter-radio-example-4"
                      class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"
                      >Last month</label
                    >
                  </div>
                </li>
                <li>
                  <div
                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    <input
                      id="filter-radio-example-5"
                      type="radio"
                      value=""
                      name="filter-radio"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      @change="closeDropdown"
                    />
                    <label
                      for="filter-radio-example-5"
                      class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300"
                      >Last year</label
                    >
                  </div>
                </li>
              </ul>
            </div>
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
            <table class="w-full whitespace-no-wrap bg-white border border-gray-300">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-blue-600">
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
                <tr v-for="barang in barangs.data" :key="barang.id" class="text-gray-700">
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
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div
            v-if="barangs && barangs.from && barangs.to && barangs.total && barangs.links"
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex items-center col-span-3">
              Showing {{ barangs.from }}-{{ barangs.to }} of {{ barangs.total }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <Pagination :links="barangs.links" />
            </span>
          </div>
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
import Modal from "../../Components/Modal/Confirm.vue";

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
      selectedBarangrId: null,
    };
  },
  methods: {
    formatDate(dateString) {
      const date = new Date(dateString);
      return date.toLocaleDateString('id-ID'); // Adjust 'id-ID' to your desired locale
    },
    toggleDropdown() {
      this.isDropdownOpen = !this.isDropdownOpen;
    },
    closeDropdown() {
      this.isDropdownOpen = false;
    },
    showDeleteModal(id) {
      this.selectedBarangId = id;
      this.showModal = true;
    },

    deleteBarang() {
  if (this.selectedBarangId) {
    this.showModal = false;
    this.$inertia.delete(`/barang/${this.selectedBarangId}`);
  }
},
  },
};
</script>

<style scoped>
/* Custom styles can go here */
</style>
