let mix = require('laravel-mix');

// the custom script that is used in the application
mix.scripts([
  'resources/js/public.js'
], 'public/js/app.js');

// all the styles that are publicly used
mix.sass('resources/assets/sass/app.scss', 'public/css');