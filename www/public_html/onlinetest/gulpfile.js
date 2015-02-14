var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
	vinylPaths = require('vinyl-paths'),
	del = require('del');

var devdir = '../../laravel4/app/dist/';
var styledevdir = devdir + 'style/';
var scriptdevdir = devdir + 'script/';
var libdevdir = devdir + 'lib/';
var fontdevdir = devdir + 'font/';
var imgdevdir = devdir + 'img/';

/**
 * Compile sass based style and put on temporary dir
 */
gulp.task('compile_sass', function() {
    return sass(styledevdir + 'raw/', ({ style: 'expanded' }))
        .pipe(rename({ extname: '.max.css' }))
        .pipe(gulp.dest(styledevdir + 'temp'));
});

/**
 * Compile (copy) css and put on temporary dir
 */
gulp.task('compile_css', function() {
    return gulp.src(styledevdir + 'raw/*.css')
        .pipe(rename({ extname: '.max.css' }))
        .pipe(gulp.dest(styledevdir + 'temp'));
});

/**
 * Minify compiled sass (already css-typed) and put on temp dir too
 */
gulp.task('minify_css', ['compile_sass', 'compile_css'], function() {
    return gulp.src(styledevdir + 'temp/*.max.css')
        .pipe(rename({ extname: '' }))
        .pipe(rename({ extname: '.min.css' }))
		// See bug https://github.com/jonathanepollack/gulp-minify-css/issues/61
        .pipe(minifycss({ processImport: false }))
        .pipe(gulp.dest(styledevdir + 'temp/'));
});

/**
 * Concatenate all style and put on public dir
 */
gulp.task('styles', ['minify_css'], function() {
	// See bug https://github.com/jonathanepollack/gulp-minify-css/issues/61
	var vp = vinylPaths();

    return gulp.src(styledevdir + 'temp/*.min.css')
        .pipe(concat('styles.min.css'))
        .pipe(gulp.dest('./style'))
        .pipe(notify({ message: 'SASS compiled, all styles minifyed and concated.' }))
		.on('end', function () {
        	del(vp.paths, { force: true });
        });
});

/**
 * Minify (uglify) then concatenate all script and put on public dir
 */
gulp.task('scripts', function() {
    return gulp.src(scriptdevdir + 'raw/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./script'))
        .pipe(notify({ message: 'JavaScript ready.' }));
});

/**
 * Copy libs, scripts, fonts, images
 */
gulp.task('libs', function() {
    return gulp.src(libdevdir + '**/*')
        .pipe(gulp.dest('./lib'));
});

gulp.task('fonts', function() {
    return gulp.src(fontdevdir + '**/*')
        .pipe(gulp.dest('./font'));
});

gulp.task('imgs', function() {
    return gulp.src(imgdevdir + '**/*')
        .pipe(gulp.dest('./img'));
});

gulp.task('htmls', function() {
    return gulp.src(devdir + '**/*.html')
        .pipe(gulp.dest('./'));
});

gulp.task('others', function() {
    return gulp.src(devdir + '*')
        .pipe(gulp.dest('./'));
});

function syncAll() {
    gulp.start('styles');
    gulp.start('scripts');
    gulp.start('libs');
    gulp.start('imgs');
    gulp.start('htmls');
    gulp.start('others');
}

/**
 * Watch for change event
 */
gulp.task('watch', function() {
	syncAll();
    gulp.watch(styledevdir + 'raw/*', ['styles']);
    gulp.watch(scriptdevdir + 'raw/*.js', ['scripts']);
    gulp.watch(libdevdir + '**/*', ['libs']);
    gulp.watch(imgdevdir + '**/*', ['imgs']);
    gulp.watch(devdir + '**/*.html', ['htmls']);
    gulp.watch(devdir + '*', ['others']);

    // Buat server livereload
    livereload.listen({
        port: 9000
    });
    gulp.watch(['**/*']).on('change', livereload.changed);
    gulp.watch(['../../laravel4/app/views/**/*.blade.php']).on('change', livereload.changed);
});

gulp.task('default', function() {
	syncAll();
});
