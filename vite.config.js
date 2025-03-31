import { defineConfig } from 'vite';  // Use import instead of require
import laravel from 'laravel-vite-plugin';  // Use import instead of require

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,  // Enables automatic browser refresh when changes are made
    }),
  ],
});
