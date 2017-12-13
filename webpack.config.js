const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')

const config = {
  entry: './js/index.js',

  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.min.js'
  },

  devtool: 'eval-source-map',

  module: {
    rules: [
      {
         test: /\.js$/,
         loader: 'babel-loader',
         exclude: /node_modules/,
         options: {
          presets: [
            'babel-preset-es2015',
            'babel-preset-env'
          ].map(require.resolve)
        }
      },

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
      }
    ]
  },

  plugins: [
    new UglifyJsPlugin() //Minificar el bundle
  ]
}


module.exports = config;