'use strict'

const path = require('path')

const themeDirectory = process.cwd()

module.exports =  {
	js: {
		index: path.resolve(themeDirectory, 'src/js/index.js')
	},
	css: {
		style: path.resolve(themeDirectory, 'src/stylus/style.styl')
	},
	output: {
		js: 'wp-content/themes/minamoto-webpack/dist/js',
		css: 'wp-content/themes/minamoto-webpack/dist/css',
	},
	outputRoot: path.resolve(themeDirectory, 'dist'),
	packageJson: path.resolve(themeDirectory, 'package.json')
}