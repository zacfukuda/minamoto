/**
 * Webpack config file for building the unminified file.
 */

'use strict'

// Argument passed to the NPM command
const argv = require('minimist')(process.argv.slice(3))

module.exports = {
	mode: 'none',
	output: {
		filename: 'app.js'
	},
	devtool: 'source-map'
}