const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./src/**/*.{html,js}",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            height: {
                '128': '32rem',
                '142': '42rem',
                '152': '52rem',
              },
            width: {
                '128': '32rem',
                '142': '42rem',
                '152': '52rem',
              }
              
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
