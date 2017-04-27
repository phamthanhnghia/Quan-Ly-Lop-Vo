const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/styles.css',
    'resources/assets/css/font-awesome.min.css'
], 'public/css/all.css')
mix.scripts([
    'resources/assets/js/bootstrap.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/scripts.js',
    'public/js/dashboard.js'
], 'public/js/all.js');