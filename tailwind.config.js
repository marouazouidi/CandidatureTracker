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
                primary: '#A85C7A',
                'primary-hover': '#8E4D68',
                sidebar: '#7A3F59',
                bg: '#F7F2E9',
                card: '#FFFFFF',
                border: '#E9DFD4',
                'text-primary': '#1F1F1F',
                'text-secondary': '#6B7280',
                success: { DEFAULT: '#D6F0DD', text: '#2E7D4F' },
                danger: { DEFAULT: '#F6D4D4', text: '#C0392B' },
                warning: { DEFAULT: '#F8E7B0', text: '#9A6B00' },
                info: { DEFAULT: '#D9E7FF', text: '#3563D8' },
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
