var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');

elixir.config.js.browserify.watchify.options.poll = true;

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
    mix.sass('app.scss');
    mix.browserify('app.js')
    mix.version(['public/js/app.js', 'public/css/app.css']);
    mix.browserSync({
        proxy: 'picturesque.local'
    });
});
