import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import withMT from "@material-tailwind/html/utils/withMT";

/** @type {import('tailwindcss').Config} */
export default withMT ({
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                inconsolata: ['Inconsolata'],
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
});
