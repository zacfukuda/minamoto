/**
 * Gulp Configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 */

// Load package.json
const packageJSON = require('./package.json')

// Import modules
const browserSync = require('browser-sync').create()
const gulp = require('gulp')
const	autoprefixer = require('gulp-autoprefixer')
// const concat = require('gulp-concat')
const gcmq = require('gulp-group-css-media-queries')
const gulpif = require('gulp-if')
const	plumber = require('gulp-plumber')
const rename = require('gulp-rename')
const sourcemaps = require('gulp-sourcemaps')
const	stylus = require('gulp-stylus')
const uglify = require('gulp-uglify')

// Argument
const argv = require('minimist')(process.argv.slice(3))
const isDevelopment = (argv.dev === true) ? true:false
const isProduction = (argv.pro === true) ? true:false
const isBrowsersyncOn = (process.argv[2] === 'server') ? true : false

// Broswersync
const reload = browserSync.reload

// Source files
const src = {
	stylus: './src/stylus/',
	js: './src/js/'
}
// Destination of output files
const dist = {
	css: './css/',
	js: './js/'
}

// Compile files
const compileFiles = {
	stylus: [
		src.stylus+'*.styl',
		'!'+src.stylus+'_*.styl'
	],
	js: src.js+'*.js'
}

// Watch files
const watchFiles = {
	stylus: src.stylus + '**\/*.styl',
	js: src.js + '**\/*.js'
}

// Stylus
gulp.task('stylus', () => {
	return gulp.src(compileFiles.stylus)
		.pipe(plumber())
		.pipe(gulpif(isProduction, sourcemaps.init()))
		.pipe(stylus({compress: isProduction}))
		.pipe(gulpif(isProduction, gcmq()))
		.pipe(autoprefixer({browsers: browsers}))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulpif(isProduction, sourcemaps.write('.')))
		.pipe(gulp.dest(dist.css))
		.pipe(gulpif(isBrowsersyncOn, browserSync.stream()))
})

// Javascript
gulp.task('js', () => {
	return gulp.src(compileFiles.js)
		.pipe(plumber())
		.pipe(gulpif(isProduction, sourcemaps.init()))
		// .pipe(concat('bundle.js'))
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulpif(isProduction, sourcemaps.write('.')))
		.pipe(gulp.dest(dist.js))
})

gulp.task('js-sync', ['js'], (done) => {
	browserSync.reload()
	done()
})

// Watch
gulp.task('watch', () => {
	gulp.watch(watchFiles.stylus, ['stylus'])
	gulp.watch(watchFiles.js, ['js'])
})

// Browsersync Server
gulp.task('server', () => {

	// Init Browsersync
	browserSync.init({
		open: false,
		proxy: packageJSON.proxy
	})

	// Watch files
	gulp.watch(watchFiles.stylus, ['stylus'])
	gulp.watch(watchFiles.js, ['js-sync'])

	// Ultimately, you can watch all PHP file
	// gulp.watch('**\/*.php').on('change', reload)
})

// Build
gulp.task('build', ['stylus', 'js'], () => {

	// Output unminified version
	gulp.src(compileFiles.stylus)
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer({browsers: browsers}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dist.css))

	gulp.src(compileFiles.js)
		.pipe(sourcemaps.init())
		// .pipe(concat('bundle.js'))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dist.js))
})