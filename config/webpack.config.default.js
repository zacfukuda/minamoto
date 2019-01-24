/**
 * Webpack config file for building the production file.
 */

'use strict'

const UglifyJsPlugin = require("uglifyjs-webpack-plugin")

// Argument passed to the NPM command
const argv = require('minimist')(process.argv.slice(3))

const config = {
	mode: argv.pro ? 'production' : 'development',
	output: {
		filename: 'app.min.js'
	},
	// Uncomment the line below if you want to use jQuery from a CDN
	// externals: {
	//	jquery: 'jQuery'
	// },
	devtool: argv.pro ? 'source-map' : 'cheap-module-eval-source-map'
}

// Production only: Add UglifyjsWebpackPlugin
if ( argv.pro ) {
	config.optimization = {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: false
			})
		]
	}
}

module.exports = config