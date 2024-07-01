<template>
  <div class="flex justify-center items-center h-screen bg-gray-100">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row justify-center space-y-8 md:space-y-0 md:space-x-8">
        <div class="w-full md:w-1/2">
          <div class="max-w-md mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="py-8 px-6">
              <h2 class="text-sm font-semibold text-gray-800 text-center mb-6">Masuk ke Akun Anda</h2>
              <form @submit.prevent="submitLogin">
                <div class="mb-4">
                  <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input v-model="form.email" type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan email Anda" required aria-required="true">
                  <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
                </div>
                <div class="mb-4">
                  <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                  <input v-model="form.password" type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan kata sandi Anda" required aria-required="true">
                  <p v-if="form.errors.password" class="text-red-500 text-xs mt-1">{{ form.errors.password }}</p>
                </div>
                <div>
                  <button type="submit" :disabled="form.processing" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span v-if="form.processing">
                      Loading...
                    </span>
                    <span v-else>
                      Masuk
                    </span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  email: '',
  password: ''
});

const submitLogin = () => {
  form.post('/');
};
</script>
