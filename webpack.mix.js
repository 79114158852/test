let mix = require('laravel-mix');
mix
.js('resources/js/app.js', 'public/assets/js/app.js')
.autoload({
    jquery: ['$', 'window.jQuery']
})
.postCss('resources/css/app.css', 'public/assets/css/style.css', 
    [require('postcss-minify')]
);

