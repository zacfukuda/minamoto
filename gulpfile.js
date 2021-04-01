/**
 * Gulp Configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 * @link https://webpack.js.org/guides/integrations/#gulp
 */

const argv = require('minimist')(process.argv.slice(3))

process.env.BABEL_ENV = argv.pro ? 'production' : 'development'
process.env.NODE_ENV = argv.pro ? 'production' : 'development'

const packageJSON = require('./package.json')
const paths = require('./config/paths')

const browserSync = require('browser-sync').create()
const { src, dest, watch, parallel, series } = require('gulp')
const	autoprefixer = require('gulp-autoprefixer')
const gulpif = require('gulp-if')
const	plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const	stylus = require('gulp-stylus')
const touch = require('gulp-touch-fd')
const webpack = require('webpack')
const gulpWebpack = require('webpack-stream')

const isBrowsersyncOn = (process.argv[2] === 'start') ? true : false

const stylusTask = () => src(paths.compile.stylus)
	.pipe(plumber())
	.pipe(gulpif(argv.pro, sourcemaps.init()))
	.pipe(stylus({compress: argv.pro}))
	.pipe(autoprefixer())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulpif(argv.pro, sourcemaps.write('.')))
	.pipe(dest(paths.dist.css))
	.pipe(touch())
	.pipe(gulpif(isBrowsersyncOn, browserSync.stream()))

exports.stylus = stylusTask

const jsTask = () => src(paths.compile.js)
	.pipe(plumber())
	.pipe(gulpWebpack(require('./config/webpack.config'), webpack))
	.pipe(dest(paths.dist.js))
	.pipe(touch())

exports.js = jsTask

const jsSync = (cb) => {
	browserSync.reload()
	cb()
}

const buildUncompressed = (cb) => {

	src(paths.compile.stylus)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.dist.css))
		.pipe(touch())

	src(paths.compile.js)
		.pipe(plumber())
		.pipe(gulpWebpack(require('./config/webpack.config.uncompressed'), webpack))
		.pipe(dest(paths.dist.js))
		.pipe(touch())

	cb()
}

exports.build = series(
	parallel(stylusTask, jsTask),
	buildUncompressed
)

exports.watch = () => {
	watch(paths.watch.stylus, stylusTask)
	watch(paths.watch.js, jsTask)
}

exports.start = series(
	parallel(stylusTask, jsTask),
	() => {
		watch(paths.watch.stylus, stylusTask)
		watch(paths.watch.js, series(jsTask, jsSync))

		browserSync.init({
			open: false,
			proxy: packageJSON.proxy
		})
	},
)
