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

elixir.config.assetsPath = 'resources/assets';
elixir.config.publicPath = 'public/assets';

elixir.config.css.sass.pluginOptions.includePaths = [
	'node_modules/bootstrap-sass/assets/stylesheets',
	'node_modules/font-awesome/scss'
];

elixir(function(mix) {
	mix.copy('node_modules/bootstrap-sass/assets/fonts', elixir.config.publicPath+'/fonts');
	mix.copy('node_modules/font-awesome/fonts', elixir.config.publicPath+'/fonts');

	mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', elixir.config.assetsPath+'/js/bootstrap.js');
	mix.copy('node_modules/jquery/dist/jquery.min.js', elixir.config.assetsPath+'/js/jquery.js');
	mix.copy('node_modules/moment/min/moment.min.js', elixir.config.assetsPath+'/js/moment.js');

	mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', elixir.config.assetsPath+'/js/datepicker.js');
	mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss', elixir.config.assetsPath+'/sass/datepicker.scss');

	mix.scripts([
			'jquery.js', 'bootstrap.js', 'moment.js', 'datepicker.js'
		]);

	// mix.copy(elixir.config.assetsPath+'/js/datepicker', elixir.config.publicPath+'/js/datepicker');

    mix.sass('admin.scss');
    mix.sass('front.scss');
});
