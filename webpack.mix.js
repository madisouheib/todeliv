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
   'resources/js/files/prism/js/prism.min.js',

], 'public/js/admin.js' ).scripts(['resources/js/webs/js/src/plugins/jquery-1.11.1.min.js',
'resources/js/webs/js/src/plugins/bootstrap.min.js',
'resources/js/webs/modules/slick/slick.js',
'resources/js/files/material-datetimepicker/js/bootstrap-material-datetimepicker.js',
'resources/js/webs/js/src/plugins/jquery.countTo.js',
'resources/js/webs/modules/vertical-timeline/js/modernizr.js',
'resources/js/webs/modules/vertical-timeline/js/main.js',
'resources/js/webs/modules/revolution/js/jquery.themepunch.tools.min.js',
'resources/js/webs/modules/revolution/js/jquery.themepunch.revolution.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.actions.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.kenburn.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.carousel.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.layeranimation.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.migration.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.navigation.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.parallax.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.slideanims.min.js',
'resources/js/webs/modules/revolution/js/extensions/revolution.extension.slideanims.min.js'
],'public/js/webs.js').options({
   processCssUrls: true
});
