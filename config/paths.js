/* eslint-env node */
const path = require('path')
const themeRoot = process.cwd()

const srcRoot = path.resolve(themeRoot, 'src')
const distRoot = path.resolve(themeRoot, 'dist')

const src = {
	stylus: path.resolve(srcRoot, 'stylus'),
	js: path.resolve(srcRoot, 'ts'),
}
const dist = {
	css: path.resolve(distRoot, 'css'),
	js: path.resolve(distRoot, 'js'),
}

const compile = {
	stylus: [
		path.resolve(src.stylus, '*.styl'),
		'!' + path.resolve(src.stylus, '_*.styl'),
	],
	js: path.resolve(src.js, 'index.ts'),
}
const watch = {
	stylus: path.resolve(src.stylus, '**/*.styl'),
	js: path.resolve(src.js, '**/*.ts'),
}

module.exports = { src, dist, compile, watch }
