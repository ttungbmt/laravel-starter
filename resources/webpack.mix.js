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

mix
    .setPublicPath('../public')
    .webpackConfig({
        externals: {
           vue: 'Vue',
           'lodash-es': '_',
           jquery: '$',
           axios: 'axios',
        }
    });

mix
    .js('js/app.js', 'js')
    // .sass('sass/app.scss', 'css')
;
