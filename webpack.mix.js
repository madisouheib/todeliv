const mix = require('laravel-mix');

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


mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css').scripts([
   'resources/js/files/vendor-all.min.js',
   'resources/js/files/bootstrap/js/bootstrap.min.js',
   'resources/js/files/pcoded.min.js',
   'resources/js/files/moment-with-locales.min.js',
   'resources/js/files/material-datetimepicker/js/bootstrap-material-datetimepicker.js',
   'resources/js/files/form-picker-custom.js',
   'resources/js/files/prism/js/prism.min.js'



], 'public/js/admin.js').options({
   processCssUrls: true
});
