import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    vue(),
    laravel({
        input: [
          // Global Imports
          'resources/css/app.scss',
          'resources/js/app.js',
          'resources/js/helpers.js',

          // Webquest
          'resources/_webquest/js/app.js',
          'resources/_webquest/scss/app.scss',

          // Portfolio
          'resources/_portfolio/js/app.js',
          'resources/_portfolio/scss/app.scss',
        ],
        refresh: true,
    }),
  ],
  // css: {
  //   preprocessorOptions: {
  //     scss: {
  //       additionalData: `
  //         @import "./resources/css/preload/_global.scss";
  //       `
  //     }
  //   },
  // },
});