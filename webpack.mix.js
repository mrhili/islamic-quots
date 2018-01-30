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
/*
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
*/

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/fa-svg-with-js.css',
    'resources/assets/css/magnific-popup.css',
    'resources/assets/css/app.css',
], 'public/css/app.css')
.scripts([
    'resources/assets/js/jquery-3.3.1.min.js',
    'resources/assets/js/poper.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/sweetAlert.min.js',
    'resources/assets/js/fontawesome-all.js',
    'resources/assets/js/jquery.magnific-popup.min.js',
    'resources/assets/js/appN.js'
], 'public/js/app.js');