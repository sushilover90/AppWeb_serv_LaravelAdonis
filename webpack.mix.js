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
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts(["node_modules/now-ui-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js",
    "node_modules/now-ui-dashboard/assets/js/plugins/chartjs.min.js",
    "node_modules/now-ui-dashboard/assets/js/plugins/bootstrap-notify.js",
    "node_modules/now-ui-dashboard/assets/js/now-ui-dashboard.js"], 'public/js/ui.js');

mix.styles(["node_modules/now-ui-dashboard/assets/css/now-ui-dashboard.min.css"],'public/css/ui.css');



// mix.scripts(["node_modules/sweetalert2/dist/sweetalert2.all.min.js"], 'public/js/sweetalert2.js');

// mix.styles(["node_modules/sweetalert2/dist/sweetalert2.min.css"],'public/css/sweetalert2.css');
