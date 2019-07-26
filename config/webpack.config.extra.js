/**
 * Webpack config file for building the unminified file.
 */

'use strict'

// Argument passed to the NPM command
// const argv = require('minimist')(process.argv.slice(3))

// External modules
const externals = require('./webpack.config.externals')

module.exports = {
	mode: 'none',
	output: {
		filename: 'app.js'
	},
	externals: externals,
	devtool: 'source-map'
}
