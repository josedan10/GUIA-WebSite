const path = require('path');
const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

const config = {
  entry: [
    './js/index.jsx',
  ],

  output: {
    path: path.resolve(__dirname, 'dist'),
    publicPath: '/dist/',
    filename: 'bundle.min.js' //Archivo de salida
  },

  devtool: 'eval-source-map',

  devServer: {
    inline: true,
  },

  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [{
                loader: "style-loader" // creates style nodes from JS strings
            }, {
                loader: "css-loader" // translates CSS into CommonJS
            }, {
                loader: "sass-loader" // compiles Sass to CSS
            }],
        exclude: /node_modules/
      },

      {
        test: /\.jsx$/,
        exclude: /(node_modules|bower_components)/,
        use: [{
          loader:'babel-loader',
          options: {
              presets: ['react', 'env', 'es2015']
          }
        }]
      }
    ]
  },

  plugins: [
    //new UglifyJsPlugin() //Minificar el bundle
  ]
};


module.exports = config;