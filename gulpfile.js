/* eslint-env node */
/**
 * @file Gulp configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 * @link https://webpack.js.org/guides/integrations/#gulp
 */
const command = process.argv[2]
const isBrowserSyncOn = command === 'start' ? true : false
const isProductionBuild = command === 'build' ? true : false

process.env.BABEL_ENV = isProductionBuild ? 'production' : 'development'
process.env.NODE_ENV = isProductionBuild ? 'production' : 'development'

const browserSync = require('browser-sync').create()
const { src, dest, watch, parallel, series } = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const stylus = require('gulp-stylus')
const touch = require('gulp-touch-fd')
const webpack = require('webpack')
const webpackStream = require('webpack-stream')

const config = require('./package.json')
const paths = require('./config/paths')

function reload(callback) {
	browserSync.reload()
	callback()
}

function cssStream(shouldCompress) {
	const compress = shouldCompress ? true : false
	let stream = src(paths.compile.stylus).pipe(plumber())

	if (isProductionBuild) stream = stream.pipe(sourcemaps.init())

	stream = stream.pipe(stylus({ compress })).pipe(autoprefixer())

	if (compress || !isProductionBuild) {
		stream = stream.pipe(rename({ suffix: '.min' }))
	}
	if (isProductionBuild) stream = stream.pipe(sourcemaps.write('.'))

	stream = stream.pipe(dest(paths.dist.css)).pipe(touch())

	if (isBrowserSyncOn) stream = stream.pipe(browserSync.stream())

	return stream
}

function css() {
	return cssStream(isProductionBuild)
}

function cssUncompressed() {
	return cssStream(false)
}

function jsStream(webpackConfig) {
	return src(paths.compile.js)
		.pipe(plumber())
		.pipe(webpackStream(webpackConfig, webpack))
		.pipe(dest(paths.dist.js))
		.pipe(touch())
}

function js() {
	return jsStream(require('./config/webpack.config'))
}

function jsUncompressed() {
	return jsStream(require('./config/webpack.config.uncompressed'))
}

exports.css = css
exports.js = js

exports.watch = function () {
	watch(paths.watch.stylus, css)
	watch(paths.watch.js, js)
}

exports.build = series(
	parallel(css, js),
	parallel(cssUncompressed, jsUncompressed)
)

exports.start = series(css, js, () => {
	watch(paths.watch.stylus, css)
	watch(paths.watch.js, series(js, reload))
	browserSync.init({ open: false, proxy: config.proxy })
})
