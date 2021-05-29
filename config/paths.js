'use strict'

const path = require('path')
const themeRoot = process.cwd()

const srcRoot = path.resolve(themeRoot, 'src'),
			distRoot = path.resolve(themeRoot, 'dist')

const src = {
	stylus: path.resolve(srcRoot, 'stylus'),
	js: path.resolve(srcRoot, 'js')
}
const dist = {
	css: path.resolve(distRoot, 'css'),
	js: path.resolve(distRoot, 'js')
}

const compile = {
	stylus: [
		path.resolve(src.stylus, '*.styl'),
		'!' + path.resolve(src.stylus, '_*.styl')
	],
	js: path.resolve(src.js, 'index.js')
}
const watch = {
	stylus: path.resolve(src.stylus, '**\/*.styl'),
	js: path.resolve(src.js, '**\/*.js')
}

module.exports = {src, dist, compile, watch}
