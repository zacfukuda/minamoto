/**
 * Webpack config file for building the uncompressed file.
 */
'use strict'

const config = require('./webpack.config')

module.exports = {
	...config,
	mode: 'none',
	output: {
		filename: '[name].js'
	},
	devtool: 'source-map',
}
