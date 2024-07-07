<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Alat Percetakan
        </h2>
        
        <!-- Dropdown Button -->
       
  
        <!-- Tombol untuk menambah alat -->
        <div class="mb-4 flex justify-end">
          <Link :href="`/alat-percetakan/create`">
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
              Tambah Alat
            </button>
          </Link>
        </div>
  
        <!-- Daftar alat -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap bg-white border border-gray-300">
  <thead>
    <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-purple-600">
      <th class="px-4 py-3 border-b border-indigo-400">No</th>
      <th class="px-4 py-3 border-b border-indigo-400">Kode Alat</th>
      <th class="px-4 py-3 border-b border-indigo-400">Nama Alat</th>
      <th class="px-4 py-3 border-b border-indigo-400">Stok</th>
      <th class="px-4 py-3 border-b border-indigo-400">Harga</th>
      <!-- <th class="px-4 py-3 border-b border-indigo-400">ID Supplier</th> -->
      <th class="px-4 py-3 border-b border-indigo-400">Keterangan</th>
      <th class="px-4 py-3 border-b border-indigo-400">Aksi</th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    <tr v-for="(alat, index) in alatpercetakans.data" :key="alat.id" class="text-gray-700">
      <td class="px-4 py-3 text-sm">{{ index + 1 }}</td>
      <td class="px-4 py-3 text-sm">{{ alat.kode_alat }}</td>
      <td class="px-4 py-3 text-sm">{{ alat.nama_alat }}</td>
      <td class="px-4 py-3 text-sm">{{ alat.stok }}</td>
      <td class="px-4 py-3 text-sm">{{ alat.harga }}</td>
      <!-- <td class="px-4 py-3 text-sm">{{ alat.id_supplier }}</td> -->
      <td class="px-4 py-3 text-sm">{{ alat.keterangan }}</td>
      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <Link :href="`/alat-percetakan/${alat.id}/edit`" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
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
            @click="showDeleteModal(alat.id)"
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
            v-if="alatpercetakans && alatpercetakans.from && alatpercetakans.to && alatpercetakans.total && alatpercetakans.links"
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex items-center col-span-3">
              Showing {{ alatpercetakans.from }}-{{ alatpercetakans.to }} of {{ alatpercetakans.total }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <Pagination :links="alatpercetakans.links" />
            </span>
          </div>
        </div>

        <Modal
          :show="showModal"
          title="Hapus Alat"
          message="Anda yakin ingin menghapus barang ini?"
          @confirm="deleteAlatPercetakan"
          @cancel="showModal = false"
        />
      </div>
    </main>
  </AppLayout>
</template>
  
  <script>
import AppLayout from '../../../Components/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Pagination from '../../../Components/Layouts/Pagination.vue';
import Modal from "../../../Components/Modal/Confirm.vue";

  export default {
    components: {
      AppLayout,
      Link,
      Modal,
      Pagination,
    },

    props: {
      alatpercetakans: Object,
    },
    data() {
    return {
      isDropdownOpen: false,
      showModal: false,
      selectedAlatPercetakanId: null,
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
      this.selectedAlatPercetakanId = id;
      this.showModal = true;
    },

    deleteAlatPercetakan() {
  if (this.selectedAlatPercetakanId) {
    this.showModal = false;
    this.$inertia.delete(`/alat-percetakan/${this.selectedAlatPercetakanId}`);
  }
},
  },

  };
  </script>
  
  
  <style>
  </style>
  