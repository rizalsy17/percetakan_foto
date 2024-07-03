<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Supplier
        </h2>

        <!-- Tombol untuk menambah supplier -->
        <div class="mb-4 flex justify-end">
          <Link :href="`/supplier/create`">
            <button
              class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white bg-green-500 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
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
              Tambah Supplier
            </button>
          </Link>
        </div>

        <!-- Daftar supplier -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap bg-white border border-gray-300">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-blue-600">
                  <th class="px-4 py-3">No</th>
                  <th class="px-4 py-3">Nama Supplier</th>
                  <th class="px-4 py-3">Perusahaan</th>
                  <th class="px-4 py-3">Telepon</th>
                  <th class="px-4 py-3">Domisili</th>
                  <th class="px-4 py-3">Alamat</th>
                  <th class="px-4 py-3">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr
                  v-for="(supplier, index) in suppliers.data"
                  :key="supplier.id"
                  class="text-gray-700 dark:text-gray-400"
                >
                <td class="px-4 py-3 text-sm">{{ index + 1}}</td>
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold">{{ supplier.nama_supplier }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">{{ supplier.perusahaan }}</td>
                  <td class="px-4 py-3 text-sm">{{ supplier.telepon }}</td>
                  <td class="px-4 py-3 text-sm">{{ supplier.domisili }}</td>
                  <td class="px-4 py-3 text-sm">{{ supplier.alamat }}</td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <Link :href="`/supplier/${supplier.id}/edit`" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
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
                        @click="showDeleteModal(supplier.id)"
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
            v-if="suppliers && suppliers.from && suppliers.to && suppliers.total && suppliers.links"
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
          >
            <span class="flex items-center col-span-3">
              Showing {{ suppliers.from }}-{{ suppliers.to }} of {{ suppliers.total }}
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
              <Pagination :links="suppliers.links" />
            </span>
          </div>
        </div>

        <Modal
          :show="showModal"
          title="Hapus Supplier"
          message="Anda yakin ingin menghapus supplier ini?"
          @confirm="deleteSupplier"
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
      Pagination,
      Modal,
    },
    props: {
      suppliers: Object,
    },
    data() {
    return {
      showModal: false,
      selectedSupplierId: null,
    };
  },
  methods: {
    showDeleteModal(id) {
      this.selectedSupplierId = id;
      this.showModal = true;
    },

    deleteSupplier() {
  if (this.selectedSupplierId) {
    this.showModal = false;
    this.$inertia.delete(`/supplier/${this.selectedSupplierId}`);
  }
},

  },
};
  
</script>

<style>
</style>
