var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less(['app.less','sortable.less'],'resources/css');

    mix.copy('bower_components/glyphicons-only-bootstrap/fonts', 'public/assets/fonts');
    //mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');

    mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        //'bower_components/font-awesome/css/font-awesome.css',
        'bower_components/glyphicons-only-bootstrap/css/bootstrap.css',
        'bower_components/glyphicons-only-bootstrap/css/bootstrap-theme.css',
        'resources/css/app.css',
    ], 'public/assets/stylesheets/styles.css', './');

    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'resources/js/frontend.js'
    ], 'public/assets/scripts/frontend.js', './');

});