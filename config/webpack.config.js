/* eslint-env node */
/**
 * @file Webpack config file for building the production file.
 */
const ESLintPlugin = require('eslint-webpack-plugin')
const paths = require('./paths')

module.exports = {
	target: 'web',
	mode: process.env.BABEL_ENV,
	devtool: process.env.BABEL_ENV === 'production' ? 'source-map' : 'eval',
	entry: { app: paths.compile.js },
	output: { filename: '[name].min.js' },
	module: {
		rules: [{ test: /\.ts?$/, use: 'ts-loader', exclude: /node_modules/ }],
	},
	resolve: {
		extensions: ['.ts'],
	},
	externals: { jquery: 'jQuery', pace: 'Pace' },
	plugins: [new ESLintPlugin({ cache: true })],
}
