<template>
  <AppLayout>
    <main class="h-full overflow-y-auto">
      <div class="container mx-auto px-6 py-8">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Dashboard
        </h2>
        <div class="grid gap-2 mb-8 md:grid-cols-3 xl:grid-cols-5">
          <!-- Card Total Suppliers -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Suppliers
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ supplier }}
              </p>
            </div>
          </div>
          <!-- Card Goods In -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Barang Masuk
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ masuk }}
              </p>
            </div>
          </div>
          <!-- Card Goods Out -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Barang Keluar
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ keluar }}
              </p>
            </div>
          </div>
          <!-- Card Total Goods -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm1 4h10v1H5V7zm0 3h10v1H5v-1zm0 3h10v1H5v-1z"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Barang
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ barang }}
              </p>
            </div>
          </div>
          <!-- Card Total Printing Equipment -->
          <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-yellow-100 dark:bg-red-500">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm1 4h10v1H5V7zm0 3h10v1H5v-1zm0 3h10v1H5v-1z"></path>
              </svg>
            </div>
            <div>
              <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Total Alat
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{ percetakan }}
              </p>
            </div>
          </div>
        </div>
        <!-- Chart Section -->
        <div class="grid gap-6 md:grid-cols-2">
          <!-- Line Chart -->
          <div class="bg-white rounded-lg shadow-md p-4">
            <vue-apex-charts width="100%" type="line" :options="chartOptionsLine" :series="seriesLine"></vue-apex-charts>
          </div>
          <!-- Bar Chart -->
          <div class="bg-white rounded-lg shadow-md p-4">
            <vue-apex-charts width="100%" type="bar" :options="chartOptionsBar" :series="seriesBar"></vue-apex-charts>
          </div>
        </div>
      </div>
    </main>
  </AppLayout>
</template>

<script>
import AppLayout from '../Components/Layouts/AppLayout.vue';
import { defineComponent } from 'vue';
import VueApexCharts from 'vue3-apexcharts';

export default defineComponent({
  components: {
    AppLayout,
    VueApexCharts
  },
  props: {
    supplier: Number,
    barang: Number,
    masuk: Number,
    keluar: Number,
    percetakan: Number,
    stok_barang: Array,
    barang_s: Array,
    total_masuk_per_bulan: Array,
    total_keluar_per_bulan: Array
  },
  data() {
    return {
      chartOptionsLine: {
        chart: {
          id: 'line-chart'
        },
        xaxis: {
          categories: this.barang_s
        }
      },
      seriesLine: [{
        name: 'Stok',
        data: this.stok_barang
      }],
      chartOptionsBar: {
        chart: {
          id: 'bar-chart'
        },
        xaxis: {
          categories: this.getCategoriesForBarChart() // Gunakan fungsi ini untuk mengambil nama bulan
        }
      },
      seriesBar: [{
        name: 'Barang Masuk',
        data: this.total_masuk_per_bulan.map(item => item.total) // Pastikan ini sesuai dengan data yang diharapkan
      }, {
        name: 'Barang Keluar',
        data: this.total_keluar_per_bulan.map(item => item.total) // Pastikan ini sesuai dengan data yang diharapkan
      }]
    };
  },
  methods: {
    getCategoriesForBarChart() {
      // Mengambil bulan-bulan dari data total_masuk_per_bulan atau total_keluar_per_bulan
      return this.total_masuk_per_bulan.map(item => this.getMonthName(item.bulan));
    },
    getMonthName(month) {
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      return monthNames[month - 1]; // -1 karena index dimulai dari 0
    }
  }
});
</script>

<style>
</style>
