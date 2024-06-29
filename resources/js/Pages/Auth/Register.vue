<template>
    <div class="flex justify-center items-center h-screen bg-gray-100">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-center space-y-8 md:space-y-0 md:space-x-8">
          <!-- <div class="w-full md:w-1/3">
            <img class="w-full" src="https://images.pexels.com/photos/25533437/pexels-photo-25533437/free-photo-of-pemandangan-lanskap-lansekap-pantai.jpeg" alt="Hero Image"/>
          </div> -->
          <div class="w-full md:w-1/2">
            <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
              <div class="py-8 px-6">
                <h2 class="text-sm font-semibold text-gray-800 text-center mb-6">Daftar Akun Baru</h2>
                <form @submit.prevent="submitRegister">
                  <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input v-model="form.name" type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan nama Anda" required>
                    <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
                  </div>
                  <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input v-model="form.email" type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan email Anda" required>
                    <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
                  </div>
                  <div class="mb-4">
                    <label for="telp" class="block text-sm font-medium text-gray-700">Telepon</label>
                    <input v-model="form.telp" type="text" id="telp" name="telp" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan nomor telepon Anda">
                    <p v-if="form.errors.telp" class="text-red-500 text-xs mt-1">{{ form.errors.telp }}</p>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <input v-model="form.password" type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan kata sandi Anda" required>
                    <p v-if="form.errors.password" class="text-red-500 text-xs mt-1">{{ form.errors.password }}</p>
                  </div>
                  <div>
                    <button type="submit" :disabled="form.processing" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <span v-if="form.processing">
                        Loading...
                      </span>
                      <span v-else>
                        Daftar
                      </span>
                    </button>
                  </div>
                </form>
                <div class="mt-6 text-center">
                  Sudah punya akun? <Link href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk Sekarang</Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { Link, useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    email: '',
    telp: '',
    password: ''
  });
  
  const submitRegister = () => {
    form.post('/register');
  };
  </script>
  
  <style scoped>
  /* Tambahkan gaya kustom di sini sesuai kebutuhan */
  </style>
  