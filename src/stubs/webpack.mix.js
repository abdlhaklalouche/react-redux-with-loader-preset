const path = require('path');
const mix = require('laravel-mix');
const CleanWebpackPlugin = require('clean-webpack-plugin');

mix.react('resources/js/app.js', 'public/js/bundle.js');

mix.webpackConfig({
   output: {
      chunkFilename: 'js/[contenthash].js',
   },
   module: {
      rules: [
        {
            test: /\.js$/,
            exclude: /node_modules/,
            loader: 'babel-loader',
            options: {
               presets: [
                  ["@babel/preset-env", { "modules": false }],
                  "@babel/preset-react",
               ],
               plugins: [
                  [
                     "@babel/plugin-proposal-class-properties", {
                        "loose": true
                     }
                  ],
                  "babel-plugin-syntax-dynamic-import"
               ]
            }
         }
      ]
   },
   plugins: [
      new CleanWebpackPlugin(['js'], {
         root: path.join(__dirname, 'public'),
         verbose: true, 
         dry: false,
      })
   ]
});

if (mix.inProduction()) {
   mix.version();
}