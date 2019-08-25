/**
 * Webpack config file for building the unminified file.
 */

'use strict'

// Argument passed to the NPM command
// const argv = require('minimist')(process.argv.slice(3))

// External modules
const config = require('./webpack.config')

module.exports = {
	...config,
	mode: 'none',
	output: {
		filename: '[name].js'
	},
	devtool: 'source-map',
}
