const gulp = require('gulp');

// Styles
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssMinify = require('gulp-csso');

// Images
const imagemin = require('gulp-imagemin');

// Fonts
const ttf2woff = require('gulp-ttf2woff');
const ttf2woff2 = require('gulp-ttf2woff2');

// Server
const server = require('browser-sync').create();

// Other
const plumber = require('gulp-plumber');
const flatten = require('gulp-flatten');
const clean = require('gulp-clean');
const rename = require('gulp-rename');
const replace = require('gulp-ext-replace');
const run = require('gulp4-run-sequence');

gulp.task('documents', () => {
	return gulp.src('pages/**/*.php')
		.pipe(gulp.dest('build/'));
});

gulp.task('immutableStyles', () => {
	return gulp.src('assets/common-styles/immutable/*.css')
		.pipe(cssMinify())
		.pipe(rename({suffix: ".min"}))
		.pipe(gulp.dest('build/assets/styles/'));
});

gulp.task('styles', () => {
	return gulp.src('assets/page-styles/*.scss')
		.pipe(plumber())
		.pipe(sass())
		.pipe(postcss([
			autoprefixer({
				overrideBrowserslist: ["cover 99.5%"]
			})
		]))
		.pipe(cssMinify())
		.pipe(rename({suffix: ".min"}))
		.pipe(gulp.dest('build/assets/styles'));
});

gulp.task('imagesPrepare', () => {
	return gulp.src([
		'assets/blocks/**/images/*.*', 
		'!assets/blocks/**/images/*.compressed.*'])
		.pipe(imagemin([
			imagemin.mozjpeg({quality: 80, progressive: true}),
			imagemin.optipng({progressive: true})
		]))
		.pipe(rename({
			suffix: ".compressed",
		}))
		.pipe(gulp.dest('assets/blocks/'));
});

gulp.task('images', () => {
	return gulp.src('assets/blocks/**/images/*.compressed.*')
		.pipe(replace('', '.compressed'))
		.pipe(flatten({ includeParents: 0} ))
		.pipe(gulp.dest('build/assets/images/'));
});

gulp.task('fontsPrepare', () => {
	return gulp.src('assets/fonts/*.ttf')
		.pipe(ttf2woff())
		.pipe(gulp.dest('assets/fonts/'))
		.pipe(gulp.src('assets/fonts/*.ttf'))
		.pipe(ttf2woff2())
		.pipe(gulp.dest('assets/fonts/'));
});

gulp.task('fonts', () => {
	return gulp.src('assets/fonts/*.+(woff|woff2)')
		.pipe(gulp.dest('build/assets/fonts/'));
});

gulp.task('database', () => {
	return gulp.src('database/**/*.*')
		.pipe(gulp.dest('build/database'));
});

gulp.task('buildClean', () => {
	return gulp.src(['build/*', '!build/database'], {read: false})
		.pipe(clean());
});

gulp.task('reload', (done) => {
	server.reload();
	done();
});

gulp.task('build', (done) => {
	run('buildClean', [
		'documents', 
		'immutableStyles', 
		'styles', 
		'images', 
		'fonts', 
		'database',
	], done);
});

gulp.task('serve', () => {
	server.init({
		server: 'build',
		notify: false,
		open: true,
		cors: true,
		ui: false,
	});

	gulp.watch('pages/**/*.php')
		.on('all', gulp.series('documents', 'reload'));
	
	gulp.watch('assets/**/*.scss')
		.on('all', gulp.series('styles', 'reload'));
		
	gulp.watch('database')
		.on('all', gulp.series('database', 'reload'));
});

gulp.task('check', () => {
	gulp.watch('pages/**/*.php')
		.on('all', gulp.series('documents'));
	
	gulp.watch('assets/**/*.scss')
		.on('all', gulp.series('styles'));
				
	gulp.watch('database')
		.on('all', gulp.series('database'));
});
