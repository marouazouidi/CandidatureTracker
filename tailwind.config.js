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
            colors: {
                cream: {
                    DEFAULT: '#FBF5E5',
                    50: '#FEFCF7',
                    100: '#FDF9EF',
                    200: '#FBF5E5',
                    300: '#F5EBCB',
                    400: '#EFDFAD',
                    500: '#E8D18C',
                },
                rose: {
                    50: '#FDF5F7',
                    100: '#FCEBF0',
                    200: '#F7D6E1',
                    300: '#F0BCCD',
                    400: '#E49DB6',
                    500: '#C890A7',
                    600: '#A35C7A',
                    700: '#8A4A66',
                    800: '#723F56',
                    900: '#5E3547',
                },
                dark: {
                    DEFAULT: '#212121',
                    50: '#F5F5F5',
                    100: '#E0E0E0',
                    200: '#BDBDBD',
                    300: '#9E9E9E',
                    400: '#757575',
                    500: '#424242',
                    600: '#212121',
                    700: '#1A1A1A',
                    800: '#141414',
                    900: '#0D0D0D',
                },
                sidebar: {
                    DEFAULT: '#A35C7A',
                    50: '#FCEBF0',
                    100: '#F0BCCD',
                    200: '#E49DB6',
                    300: '#C890A7',
                    400: '#A35C7A',
                    500: '#8A4A66',
                    600: '#723F56',
                    700: '#5E3547',
                    800: '#4A2A38',
                    900: '#3D1F2E',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
