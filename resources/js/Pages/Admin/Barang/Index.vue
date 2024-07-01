<template>
    <AppLayout>
      <main class="h-full overflow-y-auto">
        <div class="container mx-auto px-6 py-8">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Daftar Barang
          </h2>
         
          <div class="mb-4 flex justify-between relative">
          <!-- Dropdown Button -->
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
              <th class="px-4 py-3 border-b border-indigo-400">Keterangan</th>
              <th class="px-4 py-3 border-b border-indigo-400">Satuan</th>
              <th class="px-4 py-3 border-b border-indigo-400">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Contoh item barang -->
            <tr class="hover:bg-indigo-50">
              <td class="px-4 py-3 border-b border-gray-200">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">E-73938</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">Bolpoin Standart</td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">Rp3.000</td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">Rp2.000</td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">23</td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">Dijual murah</td>
              <td class="px-4 py-3 text-sm border-b border-gray-200">Ons</td>
              <td class="px-4 py-3 border-b border-gray-200">
                <div class="flex items-center space-x-4 text-sm">
                  <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:text-indigo-800 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit"
                  >
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
                  </button>
                  <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg hover:text-red-800 focus:outline-none focus:shadow-outline-gray"
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
            <!-- Tambahkan item lainnya di sini -->
          </tbody>
        </table>
            </div>
            <div
              class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
              <span class="flex items-center col-span-3">
                Showing 21-30 of 100
              </span>
              <span class="col-span-2"></span>
              <!-- Pagination -->
              <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                  <ul class="inline-flex items-center">
                    <li>
                      <button
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous"
                      >
                        <svg
                          class="w-4 h-4 fill-current"
                          aria-hidden="true"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
                        </svg>
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        1
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        2
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        3
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        4
                      </button>
                    </li>
                    <li>
                      <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        8
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                      >
                        9
                      </button>
                    </li>
                    <li>
                      <button
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next"
                      >
                        <svg
                          class="w-4 h-4 fill-current"
                          aria-hidden="true"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                          ></path>
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
  import AppLayout from '../../Components/Layouts/AppLayout.vue';
  import { Link } from '@inertiajs/vue3';

  export default {
    components: {
      AppLayout,
      Link,
    },
    data() {
    return {
      isDropdownOpen: false,
    };
  },
    methods: {
    toggleDropdown() {
      this.isDropdownOpen = !this.isDropdownOpen;
    },
    closeDropdown() {
      this.isDropdownOpen = false;
    }
  },

  };
  </script>
  
  <style>
  
  </style>
  