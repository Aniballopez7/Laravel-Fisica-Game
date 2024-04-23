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
                'resources/css/bootstrap.min.css',
                'resources/css/dataTables.bootstrap5.css',
                'resources/css/responsive.bootstrap5.css',
                'resources/font/HammersmithOne-Regular.ttf',
                'resources/js/jquery-3.7.1.js',
                'resources/js/dataTables.js',
                'resources/js/dataTables.bootstrap5.js',
                'resources/js/bootstrap.bundle.min.js'
            ],
            refresh: true,
        }),
    ],
});
