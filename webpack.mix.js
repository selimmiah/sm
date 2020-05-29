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

mix.styles([
   '../front/css/bootstrap.min.css',
   '../front/css/plugin.css',
   '../front/css/animate.css',
   '../front/css/toastr.css',
   '../front/jquery-ui/jquery-ui.min.css',
   '../front/jquery-ui/jquery-ui.structure.min.css',
   '../front/css/rtl/style.css',
   '../front/css/rtl/custom.css',
   '../front/css/common.css',
   '../front/css/rtl/responsive.css',
   '../front/css/common-responsive.css',
], '../front/css/rtl/all.css');




// mix.scripts([
// 	'../front/js/jquery.js',
// 	'../front/jquery-ui/jquery-ui.min.js',
// 	'../front/js/popper.min.js',
// 	'../front/js/bootstrap.min.js',
// 	'../front/js/plugin.js',
// 	'../front/js/xzoom.min.js',
// 	'../front/js/jquery.hammer.min.js',
// 	'../front/js/setup.js',
// 	'../front/js/toastr.js',
// 	'../front/js/main.js',
// 	'../front/js/custom.js',
// ], '../front/js/all.js');
