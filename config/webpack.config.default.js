/**
 * Webpack config file for building the production file.
 */

'use strict'

const TerserPlugin = require('terser-webpack-plugin')

// External modules
const externals = require('./webpack.config.externals')

// Argument passed to the NPM command
const argv = require('minimist')(process.argv.slice(3))

const config = {
	mode: argv.pro ? 'production' : 'development',
	output: {
		filename: 'app.min.js'
	},
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.m?js$/,
				exclude: /node_modules/,
				loader: 'eslint-loader',
				options: {
					cache: true
				}
			},
			{
				test: /\.m?js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}
			}
		]
	},
	externals: externals,
	devtool: argv.pro ? 'source-map' : 'cheap-module-eval-source-map'
}

// Production only: Add UglifyjsWebpackPlugin
if ( argv.pro ) {
	config.optimization = {
		minimizer: [
			new TerserPlugin({
				cache: true,
				parallel: true,
				sourceMap: false
			})
		]
	}
}

module.exports = config
