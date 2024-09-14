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

    


    darkMode: 'class',

    theme: {
        extend: {

            gridTemplateColumns: {
                // Simple 16 column grid
                '13': 'repeat(13, minmax(0, 1fr))',
                '14': 'repeat(14, minmax(0, 1fr))',
                '15': 'repeat(15, minmax(0, 1fr))',
                '16': 'repeat(16, minmax(0, 1fr))',
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                header: ['Josefin', 'Josefin Sans'],
                subtitulo: ['Dancing','Dancing Script'],
                general : ['Tinos','Tinos']
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
            },

            
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('tailwindcss-animated')
    ],
};
