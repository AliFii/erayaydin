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
        .less([
            './bower_components/bootstrap/less/bootstrap.less',
            './bower_components/font-awesome/less/font-awesome.less',
            './bower_components/Ionicons/less/ionicons.less',
            './bower_components/AdminLTE/build/less/AdminLTE.less',
            './bower_components/AdminLTE/build/less/skins/skin-blue.less'
        ], 'public/assets/css/backend.css')
        .copy('./bower_components/Ionicons/fonts', 'public/assets/fonts')
        .scripts([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/jquery-ui/jquery-ui.js',
            './bower_components/slimscroll/jquery.slimscroll.js',
            './bower_components/fastclick/lib/fastclick.js',
            './bower_components/AdminLTE/dist/js/app.js'
        ], 'public/assets/js/backend.js')
        .less(['./bower_components/iCheck/skins/square/blue.css'], 'public/assets/plugins/icheck/icheck.css')
        .scripts(['./bower_components/iCheck/icheck.js'], 'public/assets/plugins/icheck/icheck.js')
        .copy(['./bower_components/iCheck/skins/square/blue.png', './bower_components/iCheck/skins/square/blue@2x.png'], 'public/assets/plugins/icheck/')
        .styles([
            './bower_components/codemirror/lib/codemirror.css',
            './bower_components/simplemde/src/css/simplemde.css',
            'simplemde.css'
        ], 'public/assets/plugins/simplemde/simplemde.css')
        .scripts([
            './bower_components/codemirror/lib/codemirror.js',
            './bower_components/simplemde/dist/simplemde.min.js'
        ], 'public/assets/plugins/simplemde/simplemde.js');
});
