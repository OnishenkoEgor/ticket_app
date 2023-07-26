import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/js/**'
            ],
        }),
    ],
    server:{
        watch: {
            usePolling: true,
        },
        host: true,
        strictPort: true,
        port: 8080
    }
});
