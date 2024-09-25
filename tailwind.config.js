let colors = require('tailwindcss/colors');
const customScrollbar = require('./src/resources/js/tailwindcss/plugins/customScrollbar');
const softScrollbar = require('./src/resources/js/tailwindcss/plugins/softScrollbar');
const numberAppearanceNone = require('./src/resources/js/tailwindcss/plugins/numberAppearanceNone');


module.exports = {
    content: [
        './**/*.php',
        './src/resources/**/**/*.js',
        './src/resources/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                blue: colors.blue,
                secondary: colors.slate,
                gray: colors.gray,
                dark: colors.slate,
                red: colors.red,
                yellow: colors.yellow,
                primary: {
                    'DEFAULT': colors.black,
                    '50': '#f6f6f6',
                    '100': '#e7e7e7',
                    '200': '#d1d1d1',
                    '300': '#b0b0b0',
                    '400': '#888888',
                    '500': '#6d6d6d',
                    '600': '#5d5d5d',
                    '700': '#4f4f4f',
                    '800': '#454545',
                    '900': '#3d3d3d',
                    '950': '#000000',
                },
            },
        },
    },
    safelist: [
        'tox',
        'tox-tinymce',
        {
            pattern: /(ct|chart|chartist)-.*/,
        },
        '!overflow-hidden',
        'z-0',
        'z-10',
        'z-20',
        'z-30',
        'z-40',
        'z-50',
        'z-[100]',
        'z-auto',
        'sm:max-w-xs',
        'sm:max-w-sm',
        'sm:max-w-md',
        'sm:max-w-lg',
        'sm:max-w-xl',
        'sm:max-w-2xl',
        'sm:max-w-3xl',
        'sm:max-w-4xl',
        'sm:max-w-5xl',
        'sm:max-w-6xl',
        'sm:max-w-7xl',
        'sm:max-w-full',
        'sm:max-w-sm',
        'sm:max-w-md',
        'sm:max-w-md md:max-w-lg',
        'sm:max-w-md md:max-w-xl',
        'sm:max-w-md md:max-w-xl lg:max-w-2xl',
        'sm:max-w-md md:max-w-xl lg:max-w-3xl',
        'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-4xl',
        'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl',
        'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-6xl',
        'sm:max-w-md md:max-w-xl lg:max-w-3xl xl:max-w-5xl 2xl:max-w-7xl',

        'focus-within:ring-primary focus-within:ring-2'
    ],
    plugins: [
        require('@tailwindcss/forms'),customScrollbar, softScrollbar, numberAppearanceNone
    ],
};
