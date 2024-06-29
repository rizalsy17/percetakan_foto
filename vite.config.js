import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: 'resources/js/app.js', // Masukkan path ke file utama JavaScript Laravel Anda di sini
      refresh: true, // Aktifkan refresh otomatis saat file berubah
    }),
    vue({
      template: {
        transformAssetUrls: {
          // Atur pengubahan URL aset jika diperlukan
          base: null,
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      // Tambahkan alias sesuai dengan struktur proyek Anda jika diperlukan
      '@': '/src', // Misalnya, sesuaikan dengan struktur folder Anda
    },
  },
});
