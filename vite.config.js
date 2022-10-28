import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/sass/app.scss',
=======
                'resources/css/app.css',
>>>>>>> 747315e3d95baf5ff3c2753df2dc2267323ea004
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
