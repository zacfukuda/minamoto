/**
 * Gulp Configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 */

// Load package.json
const packageJSON = require('./package.json')

// Import modules
const browserSync = require('browser-sync').create()
const { src, dest, watch, parallel, series } = require('gulp');
const	autoprefixer = require('gulp-autoprefixer')
const gcmq = require('gulp-group-css-media-queries')
const gulpif = require('gulp-if')
const	plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const	stylus = require('gulp-stylus')
const uglify = require('gulp-uglify')
const webpack = require('webpack-stream')

// Argument
const argv = require('minimist')(process.argv.slice(3))
const isDevelopment = (argv.dev === true) ? true:false
const isProduction = (argv.pro === true) ? true:false
const isBrowsersyncOn = (process.argv[2] === 'server') ? true : false

// Paths
const paths = {
	src: {
		stylus: './src/stylus/',
		js: './src/js/'
	},
	dist: {
		css: './css/',
		js: './js/'
	}
}

// Compile files
const compileFiles = {
	stylus: [
		paths.src.stylus+'*.styl',
		'!'+paths.src.stylus+'_*.styl'
	],
	js: paths.src.js+'*.js'
}

// Watch files
const watchFiles = {
	stylus: paths.src.stylus + '**\/*.styl',
	js: paths.src.js + '**\/*.js'
}

// Stylus
const stylusTask = () => {
	return src(compileFiles.stylus)
		.pipe(plumber())
		.pipe(gulpif(isProduction, sourcemaps.init()))
		.pipe(stylus({compress: isProduction}))
		.pipe(gulpif(isProduction, gcmq()))
		.pipe(autoprefixer())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulpif(isProduction, sourcemaps.write('.')))
		.pipe(dest(paths.dist.css))
		.pipe(gulpif(isBrowsersyncOn, browserSync.stream()))
}

// Javascript
const jsTask = () => {
	return src(paths.src.js + 'index.js')
		.pipe(plumber())
		// .pipe(gulpif(isProduction, sourcemaps.init()))
		// .pipe(uglify())
		// .pipe(rename({suffix: '.min'}))
		// .pipe(gulpif(isProduction, sourcemaps.write('.')))
		.pipe(webpack({
			mode: isProduction ? 'production' : 'development',
			output: {
				filename: 'app.min.js'
			},
			devtool: isProduction ? 'source-map' : 'cheap-module-eval-source-map'
		}))
		.pipe(dest(paths.dist.js))
}

exports.js = jsTask

const jsSync = (cb) => {
	browserSync.reload()
	cb()
}

// Build unminified version of CSS & JS
const buildUnminify = (cb) => {
	// CSS
	src(compileFiles.stylus)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('.'))
		.pipe(dest(paths.dist.css))

	// JS
	src(paths.src.js + 'index.js')
		.pipe(plumber())
		// .pipe(sourcemaps.init())
		// .pipe(sourcemaps.write('.'))
		.pipe(webpack())
		.pipe(dest(paths.dist.js))

	cb()
}

// Watch
exports.watch = () => {
	watch(watchFiles.stylus, stylusTask)
	watch(watchFiles.js, jsTask)
}

exports.server = () => {
	browserSync.init({
		open: false,
		proxy: packageJSON.proxy
	})

	watch(watchFiles.stylus, stylusTask)
	watch(watchFiles.js, series(jsTask, jsSync))

	// Ultimately, you can watch all PHP file,
	// and reload browser if any change happens.
	// The author has not tested the program below,
	// but thinks it would work.
	// watch('**\/*.php', (cb) => {
	//	browserSync.reload()
	//	cb()
	// })
}

exports.build = parallel(stylusTask, jsTask, buildUnminify)