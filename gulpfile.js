var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'public/assets/css')
        .scripts([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            'app.js'
        ], 'public/assets/js/app.js')
        .scripts([
            './bower_components/html5shiv/dist/html5shiv.js',
            './bower_components/respond/dest/respond.src.js'
        ], 'public/assets/js/ie8.js')
        .copy('./bower_components/font-awesome/fonts', 'public/assets/fonts')
        .less(['./bower_components/AdminLTE/build/less/AdminLTE.less', './bower_components/AdminLTE/build/less/skins/skin-blue.less'], 'public/assets/css/backend.css')
        .scripts([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/jquery-ui/jquery-ui.js',
            './bower_components/slimscroll/jquery.slimscroll.js',
            './bower_components/fastclick/lib/fastclick.js',
            './bower_components/AdminLTE/dist/js/app.js'
        ], 'public/assets/js/backend.js');
});
