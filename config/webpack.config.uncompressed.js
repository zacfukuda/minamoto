/**
 * @file Webpack config file for building the uncompressed file.
 */

const config = require('./webpack.config')

module.exports = {
	...config,
	mode: 'none',
	output: {
		filename: '[name].js',
	},
	devtool: 'source-map',
}
