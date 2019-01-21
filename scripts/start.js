'use strict'

process.env.BABEL_ENV = 'development'
process.env.NODE_ENV = 'development'

// https://nodejs.org/api/process.html#process_event_unhandledrejection
process.on('unhandledRejection', err => {
	throw err
})

const paths = require('../config/paths')

const path = require('path')
const chalk = require('chalk')
const webpack = require('webpack')
const WebpackDevServer = require('webpack-dev-server')
const { prepareUrls } = require('react-dev-utils/WebpackDevServerUtils')
const openBrowser = require('react-dev-utils/openBrowser')

// Server config
const PORT = 3000
const HOST = 'localhost'

// Webpack config
const config = require('../config/webpack.config.start.js')

// Webpack devServer options
const options = {
	contentBase: paths.outputRoot,
	hot: true,
	host: HOST,
	https: process.env.HTTPS === 'true',
	overlay: false,
	proxy: require(paths.packageJson).proxy, // proxy all requests to VH
	watchOptions: {
		ignored: /node_modules/,
	},
}

const protocol = process.env.HTTPS === 'true' ? 'https' : 'http'
const urls = prepareUrls(protocol, HOST, PORT)
const compiler = webpack(config)
const server = new WebpackDevServer(compiler, options)

server.listen(PORT, HOST, err => {
	if (err) {
		return console.log(err)
	}
	console.log(chalk.cyan('Starting the development server on ' + HOST +':' + PORT + '...\n'));
	openBrowser(urls.localUrlForBrowser)
})