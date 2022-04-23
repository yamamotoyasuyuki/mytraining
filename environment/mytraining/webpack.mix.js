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

mix.js( 'resources/js/app.js', 'public/js' )
   .js('resources/js/dropdown.js','public/js')
   .js('resources/js/graph.js','public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/user.scss', 'public/css')
   .sass('resources/sass/signin.scss', 'public/css')
   .sass('resources/sass/main.scss', 'public/css')
   .sass('resources/sass/calendar.scss', 'public/css')
   .sass('resources/sass/pulldown.scss', 'public/css')
   .sass('resources/sass/graph.scss', 'public/css')
   .sass('resources/sass/edit.scss', 'public/css');
   
   
   