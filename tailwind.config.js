import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-yellow': '#feba33',
                'custom-blue-gray': '#898f9e',
                'custom-light-brown': '#ab8557',
                'custom-dark-brown': '#a35d1f',
                'custom-dark-blue': '#5f6b82',
            },
        },
    },

    plugins: [forms],
};