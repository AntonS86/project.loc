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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/custom/ClientLetter.js', 'public/js')
    .js('resources/js/custom/Share.js', 'public/js')
    .js('resources/js/Article/PaginateArticles.js', 'public/js')
    .js('resources/js/WorkMessage/WorkMessageHandler.js', 'public/js')
    .js('resources/js/Article/ArticleCreate.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
