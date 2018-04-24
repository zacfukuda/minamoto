/**
 * Gulp Configuration
 * @link https://github.com/gulpjs/gulp
 * @link https://browsersync.io/docs/gulp
 */

const browserSync = require('browser-sync').create();
const gulp = require('gulp')
const	autoprefixer = require('gulp-autoprefixer')
// const concat = require('gulp-concat')
// const gcmq = require('gulp-group-css-media-queries')
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
const proxyTarget = 'http://wordpress.localhost'

// Browser support for autoprefixer
const browsers = ['last 2 version', 'safari 5', 'ie 6', 'ie 7', 'ie 8', 'ie 9', 'ie 10', 'ie 11', 'opera 12.1', 'ios 6']

// Srouce files
const src = {
	stylus: './src/stylus/',
	js: './src/js/'
}
// Destination
const dist = {
	css: './dist/css/',
	js: './dist/js/'
}

// Stylus
gulp.task('stylus', () => {
	return gulp.src([
			src.stylus+'*.styl',
			'!'+src.stylus+'_*.styl'
		])
		.pipe(plumber())
		.pipe(gulpif(isProduction, sourcemaps.init()))
		.pipe(stylus({compress: true}))
		// .pipe(gcmq())
		.pipe(autoprefixer({browsers: browsers}))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulpif(isProduction, sourcemaps.write('.')))
		.pipe(gulp.dest(dist.css))
		.pipe(gulpif(isBrowsersyncOn, browserSync.stream()))
})

// JS
gulp.task('js', () => {
	return gulp.src(src.js+'*.js')
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
	gulp.watch(src.stylus + '**\/*.styl', ['stylus'])
	gulp.watch(src.js + '**\/*.js', ['js'])
})

// Browsersync Server
gulp.task('server', () => {

	// Init Browsersync
	browserSync.init({
		open: false,
		proxy: {
			target: proxyTarget
		}
	})

	// Watch files
	gulp.watch(src.stylus + '**\/*.styl', ['stylus'])
	gulp.watch(src.js + '**\/*.js', ['js-sync'])

	// Ultimately, you can watch all PHP file
	// gulp.watch('**\/*.php').on('change', reload)
})

// Build
gulp.task('build', ['stylus', 'js'], () => {

	// Output unminified version
	gulp.src([
			src.stylus+'*.styl',
			'!'+src.stylus+'_*.styl'
		])
		.pipe(sourcemaps.init())
		.pipe(stylus())
		.pipe(autoprefixer({browsers: browsers}))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest( dist.css))

	gulp.src(src.js+'*.js')
		.pipe(sourcemaps.init())
		// .pipe(concat('bundle.js'))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(dist.js))
})