import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js', // Main JavaScript file
        'resources/css/app.css', // Main CSS file
        'resources/css/tailwind.output.css', // Tailwind CSS file
      ],
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
