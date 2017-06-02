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

mix.js('resources/assets/js/app.js', 'public/js');
mix.js('resources/assets/js/udb_flashplayer.js', 'public/js');
mix.js('resources/assets/js/udb_showpdf.js', 'public/js');
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.styles('resources/assets/css/rkm-udb.css', 'public/css/rkm-udb.css');