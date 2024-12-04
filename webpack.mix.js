const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app1.js', 'js/app1.js')
    .js('resources/js/content.js', 'js/content.js')
    .vue()
    .sass('resources/sass/app.scss', 'css/app.css')
    .sass('resources/sass/app2.scss', 'css/app2.css');
