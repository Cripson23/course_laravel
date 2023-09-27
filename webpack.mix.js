const mix = require('laravel-mix');
const {styles} = require("laravel-mix");

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    /*.postCss('resources/css/app.css', 'public/css', [
        //
    ]);*/
