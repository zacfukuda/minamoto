/**
 * Gulp Configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 * @link https://webpack.js.org/guides/integrations/#gulp
 */

// Argument passed to the NPM command
const argv = require('minimist')(process.argv.slice(3))

// Do this as soon as the arguments are loaded 
process.env.BABEL_ENV = argv.pro ? 'production' : 'development'
process.env.NODE_ENV = argv.pro ? 'production' : 'development'

// Load package.json
const packageJSON = require('./package.json')

// Paths
const paths = require('./config/paths')

// Import modules
const browserSync = require('browser-sync').create()
const { src, dest, watch, parallel, series } = require('gulp')
const	autoprefixer = require('gulp-autoprefixer')
const gulpif = require('gulp-if')
const	plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const	stylus = require('gulp-stylus')
const webpack = require('webpack-stream')

// As of gulp 4, the default dest() doesn’t change the createdAt/modifiedAt
// of output files unless its source files are changed.
// gulp-touch-fd fixes this problem.
const touch = require('gulp-touch-fd')

// Set true onlu if the current gulp task is 'start'
const isBrowsersyncOn = (process.argv[2] === 'start') ? true : false

// Stylus
const stylusTask = () => src(paths.compile.stylus)
	.pipe(plumber())
	.pipe(gulpif(argv.pro, sourcemaps.init()))
	.pipe(stylus({compress: argv.pro}))
	// .pipe(gulpif(argv.pro, gcmq())) // Compression didn’t work with gcmq.
	.pipe(autoprefixer())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulpif(argv.pro, sourcemaps.write('.')))
	.pipe(dest(paths.dist.css))
	.pipe(touch())
	.pipe(gulpif(isBrowsersyncOn, browserSync.stream()))

exports.stylus = stylusTask

// JavaScript
const jsTask = () => src(paths.compile.js)
	.pipe(plumber())
	.pipe(webpack( require('./config/webpack.config') ))
	.pipe(dest(paths.dist.js))
	.pipe(touch())

exports.js = jsTask

const jsSync = (cb) => {
	browserSync.reload()
	cb()
}

// Build unminified version of CSS & JS
const buildUncompressed = (cb) => {
	// CSS
	src(paths.compile.stylus)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.dist.css))
		.pipe(touch())

	// JS
	src(paths.compile.js)
		.pipe(plumber())
		.pipe(webpack( require('./config/webpack.config.uncompressed') ))
		.pipe(dest(paths.dist.js))
		.pipe(touch())

	cb()
}

// Watch
exports.watch = () => {
	watch(paths.watch.stylus, stylusTask)
	watch(paths.watch.js, jsTask)
}

// Run browsersyc server
exports.start = series(
	parallel(stylusTask, jsTask),
	() => {
		// Initialize browsersync server
		browserSync.init({
			open: false,
			proxy: packageJSON.proxy
		})

		// Watch file changes
		watch(paths.watch.stylus, stylusTask)
		watch(paths.watch.js, series(jsTask, jsSync))

		// Ultimately, you can watch all PHP files,
		// and reload browser if any change happens.
		// The developer has not tested the code below,
		// but thinks it would work.
		// watch('**\/*.php', (cb) => {
		//	browserSync.reload()
		//	cb()
		// })
	},
)

// Build files for production
exports.build = series(
	parallel(stylusTask, jsTask),
	buildUncompressed
)
