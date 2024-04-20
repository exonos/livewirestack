const mix = require('laravel-mix');


mix.js('src/resources/js/livewirestack.js', 'public/')
    .postCss("src/resources/css/livewirestack.css", "public/", [
        require("tailwindcss"),
    ]);