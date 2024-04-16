import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/home.css',
                'resources/css/login.css',
                'resources/css/register.css',
                'resources/css/game.css',
                'resources/font/HammersmithOne-Regular.ttf',
                'resources/js/logica.js',
                'resources/js/sweetalert2.all.min.js'
            ],
            refresh: true,
        }),
    ],
});
