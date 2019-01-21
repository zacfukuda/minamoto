'use strict'

const paths = require('./paths')
// const common = require('./webpack.config.common')

const path = require('path')
const webpack = require('webpack')
const merge = require('webpack-merge')
const autoprefixer = require('autoprefixer')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
	entry: {
    main: [
    	require.resolve('react-dev-utils/webpackHotDevClient'),
      paths.js.index
    ],
    style: [
    	require.resolve('react-dev-utils/webpackHotDevClient'),
      paths.css.style
    ]
  },
  output: {
    path: paths.outputRoot,
    filename: path.join(paths.output.js, '[name].bundle.js'),
    chunkFilename: path.join(paths.output.js, '[name].chunk.js'),
    publicPath: '/'
  },
	module: {
		rules: [
			// Javascript and JSX
			{
				test: /\.jsx?$/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'],
						cacheDirectory: true,
					}
				}
			},
			// Stylus
			{
				test: /\.styl$/,
				use: [
					{
						loader: 'css-hot-loader'
					},
					{
						loader: MiniCssExtractPlugin.loader,
						options: {}
					},
					{
						loader: 'css-loader',
						options: {
							url: false,
							import: false,
							importLoaders: 2
						}
					},
					{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss-stylus',
							plugins: () => [
								autoprefixer(),
							],
							sourceMap: true
						}
					},
					{
						loader: 'stylus-loader',
						options: { sourceMap: true}
					}
				]
			},
		]
	},
	plugins: [
    new MiniCssExtractPlugin({
      filename: path.join(paths.output.css, '[name].css'),
      chunkFilename: path.join(paths.output.css, '[name].chunk.css')
    }),
    new webpack.HotModuleReplacementPlugin()
  ],
	devtool: 'cheap-module-eval-source-map',
	mode: 'development',
	performance: {
		hints: false
	},
	stats: 'minimal',
	target: 'web',
}