'use strict'

const paths = require('./paths')
const common = require('./webpack.config.common')

// const webpack = require('webpack')
const merge = require('webpack-merge')
const autoprefixer = require('autoprefixer')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const UglifyJsPlugin = require("uglifyjs-webpack-plugin")
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin")

module.exports = merge(common, {
	entry: {
    main: paths.js.index,
    style: paths.css.style
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
							sourceMap: false
						}
					},
					{
						loader: 'stylus-loader',
						options: { sourceMap: false}
					}
				]
			},
		]
	},
	optimization: {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: false
			}),
			new OptimizeCSSAssetsPlugin({})
		]
	},
	bail: true,
	devtool: 'source-map',
	mode: 'production',
	performance: false,
})