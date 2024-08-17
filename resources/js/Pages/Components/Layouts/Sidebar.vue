<template>
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                Depari Photo
            </a>
            <ul class="mt-6">
                <li :class="['relative px-6 py-3', isUrl('dashboard') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
        <Link
            :href="isUrl('/') ? '/' : '/dashboard'"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        >
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="ml-4 text-md">Dashboard</span>
        </Link>
    </li>
            </ul>
            <ul>
            <li :class="['relative px-6 py-3', isUrl('barang') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
        <Link
            :href="'/barang'"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        >
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                </path>
            </svg>
            <span class="ml-4">Manajemen Barang ATK</span>
        </Link>
    </li>

    <!-- Manajemen Supplier -->
    <li :class="['relative px-6 py-3', isUrl('supplier') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
        <Link
            :href="'/supplier'"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        >
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            <span class="ml-4">Manajemen Supplier</span>
        </Link>
    </li>

    <!-- Manajemen Karyawan -->
    <li :class="['relative px-6 py-3', isUrl('karyawan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="!$page.props.auth.user">
        <Link
            :href="'/karyawan'"
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
        >
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            <span class="ml-4">Manajemen Karyawan</span>
        </Link>
      </li>

    <li :class="['relative px-6 py-3', isUrl('barang-masuk/create', 'barang-keluar/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
        <button
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          @click="toggleTransaksi" aria-haspopup="true"
        >
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12 8c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
      </svg>
            <span class="ml-4">Transaksi ATK</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>
        </button>
        <ul v-show="transaksiOpen" class="pl-6 mt-2 space-y-2">
          <li :class="['relative px-6 py-3', isUrl('barang-masuk/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/barang-masuk/create'"
            >
              <span class="ml-4">Barang Masuk</span>
            </Link>
          </li>
          <li :class="['relative px-6 py-3', isUrl('barang-keluar/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/barang-keluar/create'"
            >
              <span class="ml-4">Barang Keluar</span>
            </Link>
          </li>
        </ul>
      </li>

      <li :class="['relative px-6 py-3', isUrl('pesanan-bahan', 'pesanan-alat') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
        <button
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          @click="toggleTransaksiPercetakan" aria-haspopup="true"
        >
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12 8c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
      </svg>
            <span class="ml-4">Transaksi Percetakan</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul v-show="transaksiPercetakanOpen" class="pl-6 mt-2 space-y-2">
          <!-- <li :class="['relative px-6 py-3', isUrl('pesanan-bahan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/pesanan-bahan'"
            >
              <span class="ml-4">Pesanan Bahan</span>
            </Link>
          </li> -->
          <li :class="['relative px-6 py-3', isUrl('pesanan-alat') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/pesanan-alat'"
            >
              <span class="ml-4">Pesanan Alat</span>
            </Link>
          </li>
        </ul>
      </li>

      <li :class="['relative px-6 py-3', isUrl('stok-barang', 'daftar-barang-masuk', 'daftar-barang-keluar') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
        <button
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          @click="toggleLaporan" aria-haspopup="true"
        >
          <span class="inline-flex items-center">
            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M4 4h16v16H4V4zm4 2v12h2V6H8zm4 0v12h2V6h-2zm4 0v12h2V6h-2z"></path>
      </svg>
            <span class="ml-4">Laporan ATK</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul v-show="laporanOpen" class="pl-6 mt-2 space-y-2">
          <!-- <li :class="['relative px-6 py-3', isUrl('stok-barang') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/stok-barang'"
            >
              <span class="ml-4">Stok Barang</span>
            </Link>
          </li> -->
          <li :class="['relative px-6 py-3', isUrl('daftar-barang-masuk') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/daftar-barang-masuk'"
            >
              <span class="ml-4">Daftar Barang Masuk</span>
            </Link>
          </li>
          <li :class="['relative px-6 py-3', isUrl('daftar-barang-keluar') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/daftar-barang-keluar'"
            >
              <span class="ml-4">Daftar Barang Keluar</span>
            </Link>
          </li>
        </ul>
      </li>
    
      <li :class="['relative px-6 py-3', isUrl('stok-bahan-baku', 'alat-percetakan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
        <button
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          @click="toggleLaporanPercetakan" aria-haspopup="true">
          <span class="inline-flex items-center">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M4 4h16v16H4V4zm4 2v12h2V6H8zm4 0v12h2V6h-2zm4 0v12h2V6h-2z"></path>
      </svg>
            <span class="ml-4">Laporan Percetakan</span>
          </span>
          <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul v-show="laporanPercetakanOpen" class="pl-6 mt-2 space-y-2">
          <!-- <li :class="['relative px-6 py-3', isUrl('stok-bahan-baku') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/stok-bahan-baku'">
              <span class="ml-4">Stok Bahan Baku</span>
            </Link>
          </li> -->
          <li :class="['relative px-6 py-3', isUrl('alat-percetakan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
            <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              :href="'/alat-percetakan'">
              <span class="ml-4">Alat Percetakan</span>
            </Link>
          </li>
        </ul>
      </li>
            </ul>

            <!-- <div class="px-6 my-6">
        <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Create account
          <span class="ml-2" aria-hidden="true">+</span>
        </button>
      </div> -->
        </div>
    </aside>

    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            Depari Photo
        </a>
        <ul class="mt-6">
            <li :class="['relative px-6 py-3', isUrl('dashboard') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
                <Link
                    :href="isUrl('/') ? '/' : '/dashboard'"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4 text-md">Dashboard</span>
                </Link>
            </li>
            <li :class="['relative px-6 py-3', isUrl('barang') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
                <Link
                    :href="'/barang'"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                    </svg>
                    <span class="ml-4">Manajemen Barang ATK</span>
                </Link>
            </li>
            
            <!-- Manajemen Supplier -->
            <li :class="['relative px-6 py-3', isUrl('supplier') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
                <Link
                    :href="'/supplier'"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="ml-4">Manajemen Supplier</span>
                </Link>
            </li>
            
            <!-- Manajemen Karyawan -->
            <li :class="['relative px-6 py-3', isUrl('karyawan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="!$page.props.auth.user">
                <Link
                    :href="'/karyawan'"
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span class="ml-4">Manajemen Karyawan</span>
                </Link>
            </li>
            
            <!-- Transaksi ATK -->
            <li :class="['relative px-6 py-3', isUrl('barang-masuk/create', 'barang-keluar/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="toggleTransaksi" aria-haspopup="true"
                >
                    <span class="inline-flex items-center">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                        </svg>
                        <span class="ml-4">Transaksi ATK</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                  </button>
                    <ul :class="[isTransaksiOpen ? 'block' : 'hidden', 'mt-2 space-y-2']">
                        <li :class="['relative px-6 py-3', isUrl('barang-masuk/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
                            <Link
                                :href="'/barang-masuk/create'"
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <span class="ml-4">Barang Masuk</span>
                            </Link>
                        </li>
                        <li :class="['relative px-6 py-3', isUrl('barang-keluar/create') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']">
                            <Link
                                :href="'/barang-keluar/create'"
                                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                            >
                                <span class="ml-4">Barang Keluar</span>
                            </Link>
                        </li>
                    </ul>
                </li>
                
                <!-- Transaksi Percetakan -->
                <li :class="['relative px-6 py-3', isUrl('transaksi-percetakan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
                    <Link
                        :href="'/transaksi-percetakan'"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4">Transaksi Percetakan</span>
                    </Link>
                </li>
                
                <!-- Laporan ATK -->
                <li :class="['relative px-6 py-3', isUrl('laporan-atk') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
                    <Link
                        :href="'/laporan-atk'"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4">Laporan ATK</span>
                    </Link>
                </li>
                
                <!-- Laporan Percetakan -->
                <li :class="['relative px-6 py-3', isUrl('laporan-percetakan') ? 'bg-purple-600 text-white' : 'text-gray-800 dark:text-gray-100']" v-if="$page.props.auth.user">
                    <Link
                        :href="'/laporan-percetakan'"
                        class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="ml-4">Laporan Percetakan</span>
                    </Link>
                </li>
            </ul>
        </div>
    </aside>


</template>

<script>
    import {
        Link
    } from '@inertiajs/vue3';
    import {
        ref
    } from 'vue'

    export default {
        components: {
            Link,
        },
    //     props: {
    //     auth: Object,
    // },
        setup() {
            const transaksiOpen = ref(false);
            const transaksiPercetakanOpen = ref(false);
            const laporanOpen = ref(false);
            const laporanPercetakanOpen = ref(false);

            const toggleTransaksi = () => {
                transaksiOpen.value = !transaksiOpen.value;
            };
                    const toggleTransaksiPercetakan = () => {
            transaksiPercetakanOpen.value = !transaksiPercetakanOpen.value;
            };
            const toggleLaporan = () => {
                laporanOpen.value = !laporanOpen.value;
            };
            const toggleLaporanPercetakan = () => {
            laporanPercetakanOpen.value = !laporanPercetakanOpen.value;
            };


            return {
                transaksiOpen,
                toggleTransaksi,
                transaksiPercetakanOpen,
                laporanPercetakanOpen,
                toggleTransaksiPercetakan,
                laporanOpen,
                toggleLaporan,
                toggleLaporanPercetakan,
            };
        },
        data() {
            return {
                isPagesMenuOpen: false,
            };
        },
        methods: {
            isUrl(...urls) {
                let currentUrl = this.$page.url.substr(1);
                if (urls[0] === '') {
                    return currentUrl === '';
                }
                return urls.some((url) => currentUrl === url);
            },
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
            this.isPagesMenuOpen = !this.isPagesMenuOpen
        },
    };
</script>

<style scoped>

</style>
