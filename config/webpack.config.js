/**
 * Webpack config file for building the production file.
 */
'use strict'

const path = require('path')
const paths = require('./paths')
const ESLintPlugin = require('eslint-webpack-plugin')
const TerserPlugin = require('terser-webpack-plugin')
const argv = require('minimist')(process.argv.slice(3))

module.exports = {
	target: 'web',
	mode: argv.pro ? 'production' : 'development',
	devtool: argv.pro ? 'source-map' : 'cheap-module-eval-source-map',
	entry: {
		app: path.resolve(paths.src.js, 'index.js'),
	},
	output: {
		filename: '[name].min.js'
	},
	module: {
		rules: [
			{
				test: /\.m?js$/,
				include:  paths.src.js,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				},
			}
		],
	},
	externals: {
		'body-scroll-lock': 'bodyScrollLock',
		'jquery': 'jQuery',
		'pace': 'Pace',
		'smooth-scroll': 'SmoothScroll',
	},
	optimization: {
		minimize: argv.pro,
		minimizer: [
			new TerserPlugin()
			// new TerserPlugin({parallel: true})
		],
	},
	plugins: [
		new ESLintPlugin({cache: true}),
	],
}