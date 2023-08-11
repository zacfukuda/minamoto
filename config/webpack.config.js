/* eslint-env node */
/**
 * @file Webpack config file for building the production file.
 */

const path = require('path')
const paths = require('./paths')
const ESLintPlugin = require('eslint-webpack-plugin')
const minimist = require('minimist')
const argv = minimist(process.argv.slice(3))

module.exports = {
	target: 'web',
	mode: argv.pro ? 'production' : 'development',
	devtool: argv.pro ? 'source-map' : 'eval',
	entry: {
		app: path.resolve(paths.src.js, 'index.js'),
	},
	output: { filename: '[name].min.js' },
	externals: {
		'body-scroll-lock': 'bodyScrollLock',
		jquery: 'jQuery',
		pace: 'Pace',
		'smooth-scroll': 'SmoothScroll',
	},
	plugins: [new ESLintPlugin({ cache: true })],
}
