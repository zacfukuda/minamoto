'use strict'

const path = require('path')
const themeRoot = process.cwd()

// Source directories
const srcRoot = path.resolve(themeRoot, 'src')
const src = {
	stylus: path.resolve(srcRoot, 'stylus'),
	js: path.resolve(srcRoot, 'js')
}

// Distribution directories
const distRoot = path.resolve(themeRoot, 'dist')
const dist = {
	css: path.resolve(distRoot, 'css'),
	js: path.resolve(distRoot, 'js'),
}

// Files to be compiled
const compile = {
	stylus: [
		path.resolve(src.stylus, '*.styl'),
		'!' + path.resolve(src.stylusm, '_*.styl')
	],
	js: path.resolve(src.js, 'index.js')
}

// Files to be watched its changes
const watch = {
	stylus: path.resolve(src.stylus, '**\/*.styl'),
	js: path.resolve(src.js, '**\/*.js')
}

module.exports = {
	src: src,
	dist: dist,
	compile: compile,
	watch: watch
}