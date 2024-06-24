<template>
    <div class="flex mx-auto h-screen">
      <div class="container mx-auto px-4 flex justify-center items-center">
        <div class="w-full md:w-1/1 md:ml-4">
          <div class="mx-auto flex w-full max-w-sm flex-col gap-6">
            <div class="flex flex-col text-left">
              <h1 class="text-3xl font-semibold font-poppins">Daftar</h1>
              <p class="text-sm text-left font-poppins">Daftar dan Siapkan Petualanganmu</p>
            </div>
            <form @submit.prevent="submitRegister">
              <div class="form-group">
                <div class="form-field">
                  <label class="form-label font-poppins">Nama</label>
                  <div class="form-control">
                    <input v-model="form.name" placeholder="Ketik disini..." type="text" class="input-rounded input max-w-full" />
                    <div v-if="form.errors.name" class="text-red-500">{{ form.errors.name }}</div>
                  </div>
                </div>
                <div class="form-field">
                  <label class="form-label font-poppins">Email</label>
                  <input v-model="form.email" placeholder="Ketik disini..." type="email" class="input-rounded input max-w-full" />
                  <div v-if="form.errors.email" class="text-red-500">{{ form.errors.email }}</div>
                </div>
                <div class="form-field">
                  <label class="form-label font-poppins">Kata Sandi</label>
                  <div class="form-control">
                    <input v-model="form.password" placeholder="Ketik disini..." type="password" class="input-rounded input max-w-full" />
                    <div v-if="form.errors.password" class="text-red-500">{{ form.errors.password }}</div>
                  </div>
                </div>
                <div class="form-field">
                  <label class="form-label font-poppins">Telepon</label>
                  <div class="form-control">
                    <input v-model="form.no_telp" placeholder="Ketik disini..." type="text" class="input-rounded input max-w-full" />
                    <div v-if="form.errors.no_telp" class="text-red-500">{{ form.errors.no_telp }}</div>
                  </div>
                </div>
                <div class="form-field">
                  <label class="form-label font-poppins">Alamat</label>
                  <div class="form-control">
                    <textarea v-model="form.alamat" placeholder="Ketik disini..." class="input-rounded input max-w-full"></textarea>
                    <div v-if="form.errors.alamat" class="text-red-500">{{ form.errors.alamat }}</div>
                  </div>
                </div>
                <div class="form-field pt-5">
                  <div class="form-control justify-between">
                    <button type="submit" class="btn btn-rounded bg-[#FF432A] w-full text-white" :disabled="form.processing">Daftar</button>
                  </div>
                </div>
                <div class="form-field">
                  <div class="form-control justify-center">
                    Sudah punya akun?
                    <Link href="/login" class="link link-underline-hover text-red-500 text-sm">Masuk Sekarang</Link>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="w-full md:w-1/2 px-4 mx-auto mt-8 md:mt-3">
          <img class="w-full" src="/assets/login.png" alt="Hero Image"/>
        </div>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import { Link, useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    email: '',
    password: '',
    no_telp: '',
    alamat: ''
  })
  
  const submitRegister = () => {
    form.post('/register');
  };
  </script>
  