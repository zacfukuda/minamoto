/**
 * Webpack config file for building the production file.
 */

'use strict'

// Argument passed to the NPM command
const argv = require('minimist')(process.argv.slice(3))

module.exports = {
	mode: argv.pro ? 'production' : 'development',
	output: {
		filename: 'app.min.js'
	},
	devtool: argv.pro ? 'source-map' : 'cheap-module-eval-source-map'
}