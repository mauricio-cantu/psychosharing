let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/styles.scss', 'public/css/styles.css')
    .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'public/js')
    .styles([
        'public/css/materialize.css',
        'public/css/styles.css'
    ], 'public/css/all.css');