/**
 * Webpack config file for building the production file.
 */

'use strict'

const paths = require('./paths')

const TerserPlugin = require('terser-webpack-plugin')
const argv = require('minimist')(process.argv.slice(3))

module.exports = {
	mode: argv.pro ? 'production' : 'development',
	devtool: argv.pro ? 'source-map' : 'cheap-module-eval-source-map',
	output: {
		filename: '[name].min.js'
	},
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.m?js$/,
				include: paths.src.js,
				loader: 'eslint-loader',
				options: {
					cache: true
				}
			},
			{
				test: /\.m?js$/,
				include:  paths.src.js,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}
			}
		]
	},
	externals: {
		// Refer to https://webpack.js.org/configuration/externals/
		// jquery: 'jQuery',
		// pace: 'Pace'
	},
	optimization: {
		minimize: argv.pro,
		minimizer: [
			new TerserPlugin({
				cache: true,
				parallel: true,
				sourceMap: false
			})
		]
	},
}
