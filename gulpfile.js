/**
 * @file Gulp configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 * @link https://webpack.js.org/guides/integrations/#gulp
 */

const bsFlag = process.argv[2] === 'start' ? true : false
const argv = require('minimist')(process.argv.slice(3))

process.env.BABEL_ENV = argv.pro ? 'production' : 'development'
process.env.NODE_ENV = argv.pro ? 'production' : 'development'

const config = require('./package.json')
const paths = require('./config/paths')

const bs = require('browser-sync').create()
const { src, dest, watch, parallel, series } = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const gulpif = require('gulp-if')
const plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const stylus = require('gulp-stylus')
const touch = require('gulp-touch-fd')
const webpack = require('webpack')
const webpackStream = require('webpack-stream')

const bsReload = (cb) => {
	bs.reload()
	cb()
}

const stylusTask = () =>
	src(paths.compile.stylus)
		.pipe(plumber())
		.pipe(gulpif(argv.pro, sourcemaps.init()))
		.pipe(stylus({ compress: argv.pro }))
		.pipe(autoprefixer())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulpif(argv.pro, sourcemaps.write('.')))
		.pipe(dest(paths.dist.css))
		.pipe(touch())
		.pipe(gulpif(bsFlag, bs.stream()))

const stylusTaskUncompressed = () =>
	src(paths.compile.stylus)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.dist.css))
		.pipe(touch())

const jsTask = () =>
	src(paths.compile.js)
		.pipe(plumber())
		.pipe(
			webpackStream(
				require('./config/webpack.config'),
				argv.pro ? webpack : null
			)
		)
		.pipe(dest(paths.dist.js))
		.pipe(touch())

const jsTaskUncompressed = () =>
	src(paths.compile.js)
		.pipe(plumber())
		.pipe(
			webpackStream(require('./config/webpack.config.uncompressed'), webpack)
		)
		.pipe(dest(paths.dist.js))
		.pipe(touch())

const watchTask = () => {
	watch(paths.watch.stylus, stylusTask)
	watch(paths.watch.js, jsTask)
}

const buildTask = series(
	parallel(stylusTask, jsTask),
	parallel(stylusTaskUncompressed, jsTaskUncompressed)
)

const startTask = series(parallel(stylusTask, jsTask), () => {
	watch(paths.watch.stylus, stylusTask)
	watch(paths.watch.js, series(jsTask, bsReload))
	bs.init({ open: false, proxy: config.proxy })
})

exports.stylus = stylusTask
exports.js = jsTask
exports.watch = watchTask
exports.build = buildTask
exports.start = startTask
