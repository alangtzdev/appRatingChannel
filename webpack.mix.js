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
    'resources/assets/global/plugins/font-awesome/css/font-awesome.min.css',
    'resources/assets/global/plugins/simple-line-icons/simple-line-icons.min.css',
    'resources/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    'resources/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'
], 'public/css/globalMandatoryStyle.css');

mix.styles([
    'resources/assets/global/plugins/select2/css/select2.min.css',
    'resources/assets/global/plugins/select2/css/select2-bootstrap.min.css'
], 'public/css/pageLevelPluginStyle.css');

mix.styles([
    'resources/assets/global/css/components-md.min.css',
    'resources/assets/global/css/plugins-md.min.css',
], 'public/css/themeGlobalStyle.css');
// mix.styles([
//     'assets/pages/css/login-4.min.css'
// ], 'public/css/pageLevelStyle_.css');
mix.styles([
    'resources/assets/layouts/layout/css/layout.min.css',
    'resources/assets/layouts/layout/css/themes/darkblue.min.css',
    'resources/assets/layouts/layout/css/custom.min.css'
], 'public/css/themeLayoutStyle.css');



mix.scripts([
    'resources/assets/global/plugins/jquery.min.js',
    'resources/assets/global/plugins/jquery-ui/jquery-ui.min.js',
    'resources/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'resources/assets/global/plugins/js.cookie.min.js',
    'resources/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/assets/global/plugins/jquery.blockui.min.js',
    'resources/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'
], 'public/js/corePlugins.js');

mix.scripts([
    'resources/assets/global/plugins/jquery-validation/js/jquery.validate.min.js',
    'resources/assets/global/plugins/jquery-validation/js/additional-methods.min.js',
    'resources/assets/global/plugins/select2/js/select2.full.min.js',
    'resources/assets/global/plugins/backstretch/jquery.backstretch.min.js'
], 'public/js/pageLevelScript.js');

mix.scripts([
    'assets/layouts/layout/scripts/layout.min.js',
    'assets/layouts/layout/scripts/demo.min.js',
    'assets/layouts/global/scripts/quick-sidebar.min.js'
], 'public/js/themeLayoutScript.js');
