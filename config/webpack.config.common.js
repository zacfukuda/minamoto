'use strict'

const paths = require('./paths')
const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
  output: {
    path: paths.outputRoot,
    filename: path.join(paths.output.js, '[name].bundle.js'),
    chunkFilename: path.join(paths.output.js, '[name].chunk.js'),
    publicPath: '/'
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: path.join(paths.output.css, '[name].css'),
      chunkFilename: path.join(paths.output.css, '[name].chunk.css')
    })
  ],
  target: 'web',
}
