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
                'Opena': ['Open Sans', 'sans-serif'],
                'Arima': [ 'Arima', 'system-ui'],
                'Edu': [ 'Edu AU VIC WA NT Dots', 'serif'],
                'Allerta' : ['Allerta Stencil', 'serif']

        
            },

            height: {
                '68': '17rem',
                '128': '32rem',
                '142': '42rem',
                '152': '52rem',
                '162': '62rem',
                '172': '72rem',
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
