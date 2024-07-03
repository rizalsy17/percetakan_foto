<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Daftar Karyawan
        </h2>

        <!-- Tombol untuk menambah karyawan -->
        <div class="mb-4 flex justify-end">
          <Link :href="`/karyawan/create`">
            <button
              class="flex items-center px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
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
              Tambah Karyawan
            </button>
          </Link>
        </div>

        <!-- Daftar karyawan -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap bg-white border border-gray-300">
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-blue-600">
                  <th class="px-4 py-3">No</th>
                  <th class="px-4 py-3">Nama Karyawan</th>
                  <th class="px-4 py-3">Username</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr v-for="(karyawan, index) in karyawanList.data" :key="karyawan.id" class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-sm">{{ index + 1 }}</td>
                  <td class="px-4 py-3 text-sm">{{ karyawan.name }}</td>
                  <td class="px-4 py-3 text-sm">{{ karyawan.username }}</td>
                  <td class="px-4 py-3 text-sm">{{ karyawan.email }}</td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button @click="showDeleteModal(karyawan.id)" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
        </div>

        <!-- Modal untuk konfirmasi penghapusan -->
        <Modal
          :show="showModal"
          title="Hapus Karyawan"
          message="Anda yakin ingin menghapus karyawan ini?"
          @confirm="deleteKaryawan"
          @cancel="showModal = false"
        />
      </div>
    </main>
  </AppLayout>
</template>

<script>
import AppLayout from '../../Components/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Modal from "../../Components/Modal/Confirm.vue";

export default {
  components: {
    AppLayout,
    Link,
    Modal,
  },
  props: {
    karyawanList: Object, // Properti untuk menampung data karyawan
  },
  data() {
    return {
      showModal: false,
      selectedKaryawanId: null,
    };
  },
  methods: {
    showDeleteModal(id) {
      this.selectedKaryawanId = id;
      this.showModal = true;
    },
    deleteKaryawan() {
  if (this.selectedKaryawanId) {
    this.showModal = false;
    this.$inertia.delete(`/karyawan/${this.selectedKaryawanId}`);
  }
},

  },
};
</script>

<style>
/* Gaya CSS tambahan sesuai kebutuhan */
</style>
