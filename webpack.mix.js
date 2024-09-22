const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ])
   .options({
       processCssUrls: false
   })
   .webpackConfig({
       module: {
           rules: [
               {
                   test: /\.m?js$/, // Correspond aux fichiers .js et .mjs
                   exclude: /(node_modules|bower_components)/, // Exclut node_modules
                   use: {
                       loader: 'babel-loader',
                       options: {
                           presets: ['@babel/preset-env'],
                       },
                   },
               },
           ],
       },
       resolve: {
           // Assure que les fichiers peuvent être traités en tant que modules ES
           extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
       },
   });
