<template>
    <div>
      <!-- Navbar -->
      

<nav class="bg-purple border-blue-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Depari Photo</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-purple-700 rounded md:bg-transparent md:text-purple-700 md:p-0 md:dark:text-blue-500 dark:bg-purple-600 md:dark:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </div>
            </div>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

  
      <!-- Order Service Section -->
      <section class="bg-white-100 py-20">
        <div class="container mx-auto px-4">
          <div class="max-w-3xl mx-auto text-center">
            <h3 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-5xl">
    <span class="text-transparent bg-clip-text bg-gradient-to-r to-purple-500 from-pink-500">Order Your Photo</span> Print Service
</h3>
        <p class="text-lg font-medium text-gray-800 lg:text-l dark:text-gray-400">Select your preferred service and provide necessary details.</p>

          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 Form -->
            <div class="bg-white shadow-lg rounded-lg p-6">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Print Photo</h3>
              <p class="text-gray-600 mb-4">High-quality printing for your cherished memories.</p>
              <form @submit="handleSubmit">
                <label for="print-size" class="block text-sm font-medium text-gray-700 mb-2">Print Size</label>
                <select id="print-size" name="print-size" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                  <option value="4x6">4x6 inches</option>
                  <option value="5x7">5x7 inches</option>
                  <option value="8x10">8x10 inches</option>
                </select>
                <label for="color" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Background Color</label>
                <select id="color" name="color" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                <option value="red" class="bg-red-500 text-white">Red</option>
                <option value="blue" class="bg-blue-500 text-white">Blue</option>
                </select>

                <label for="image" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Image File</label>
                <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Upload Image">

                <label for="quantity" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" step="1" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Enter quantity">
                <button type="submit" class="mt-6 main-btn bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full transition duration-300">Place Order</button>
              </form>
            </div>
            <!-- Service 2 Form -->
            <div class="bg-white shadow-lg rounded-lg p-6">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Edit Photo</h3>
              <p class="text-gray-600 mb-4">Professional editing to enhance your photos.</p>
              <form>
                <label for="editing-type" class="block text-sm font-medium text-gray-700 mb-2">Editing Type</label>
                <select id="editing-type" name="editing-type" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                  <option value="basic">Basic Editing</option>
                  <option value="advanced">Advanced Editing</option>
                </select>
            
                <label for="instructions" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Instructions</label>
                <textarea id="instructions" name="instructions" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Enter specific instructions"></textarea>
            
            
                <label for="image" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Image File</label>
                <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Upload Image">
                <button type="submit" class="mt-6 main-btn bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full transition duration-300">Place Order</button>
              </form>
            </div>
            <!-- Service 3 Form -->
            <div class="bg-white shadow-lg rounded-lg p-6">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">Photo Album</h3>
              <p class="text-gray-600 mb-4">Create custom photo albums with a personal touch.</p>
              <form>
                <label for="album-type" class="block text-sm font-medium text-gray-700 mb-2">Album Type</label>
                <select id="album-type" name="album-type" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                  <option value="wedding">Wedding Album</option>
                  <option value="travel">Travel Album</option>
                  <option value="family">Family Album</option>
                </select>
                <label for="design-style" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Design Style</label>
                <input type="text" id="design-style" name="design-style" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Enter design style preference">
               
                <label for="image" class="block text-sm font-medium text-gray-700 mt-4 mb-2">Image File</label>
                <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50" placeholder="Upload Image">
                <button type="submit" class="mt-6 main-btn bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full transition duration-300">Place Order</button>
              </form>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Footer -->
      <!-- <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
          <p>&copy; 2024 Depari Photo. All rights reserved.</p>
        </div>
      </footer> -->
    </div>
  </template>
  
  <script setup>
  // Import ref untuk mendefinisikan reactive variables
  import { ref } from 'vue';
  
  // Variabel untuk menyimpan pesan konfirmasi
  const confirmationMessage = ref('');
  
  // Metode untuk menangani submit form
  const handleSubmit = (event) => {
    event.preventDefault();
    confirmationMessage.value = 'Order placed successfully!';
    // Di sini Anda bisa menambahkan logika untuk mengirim data ke backend atau tindakan lainnya setelah submit
  };
  </script>
  
  
  <style scoped>
  .main-btn {
    background-color: #2CA35B; /* Adjust to match your design */
  }
  .main-btn:hover {
    background-color: #238C51; /* Adjust to match your design */
  }
  </style>
     