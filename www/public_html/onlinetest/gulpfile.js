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

var dev = '../../laravel4/app/dev/'

gulp.task('compile_sass', function() {
    return sass(dev+'sass/main.sass', ({ style: 'expanded' }))
        .pipe(gulp.dest(dev + 'sass/css'));
        // .pipe(gulp.dest(dev+'/sass/css'))
        // .pipe(rename({ suffix: '.min' }))
        // .pipe(minifycss())
        // .pipe(gulp.dest('style'))
        // .pipe(notify({ message: 'Styles task selesai.' }));
});

gulp.task('minify_css', ['compile_sass'], function() {
    return gulp.src(dev + 'sass/css/main.css')
        .pipe(rename({ suffix: '.min' }))
		.pipe(notify({ message: 'Minify : Wait, in progress...' }))
		// See bug https://github.com/jonathanepollack/gulp-minify-css/issues/61
        .pipe(minifycss({ processImport: false }))
		.pipe(notify({ message: 'Minify : Done.' }))
        .pipe(gulp.dest(dev + 'sass/min'));
})

gulp.task('styles', ['minify_css'], function() {
    var files = [
        dev + 'sass/min/normalize.min.css',
        dev + 'sass/min/boilerplate.min.css',
//        dev+'sass/min/bootstrap.min.css',
        dev + 'sass/min/main.min.css'
    ]

	// See https://github.com/gulpjs/gulp/blob/master/docs/recipes/delete-files-folder.md
	var vp = vinylPaths();
    return gulp.src(files)
		.pipe(vp)
        .pipe(concat('styles.min.css'))
        .pipe(gulp.dest('./style'))
        .pipe(notify({ message: 'SASS compiled, all styles minifyed and concated.' }))
		.on('end', function () {
        	del(vp.paths, { force: true });
        });
})

gulp.task('scripts', function() {
    return gulp.src(dev+'js/main.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./script'))
        .pipe(notify({ message: 'JavaScript ready.' }));
})

gulp.task('watch', function() {
    gulp.watch(dev + 'sass/main.sass', ['styles'])
    gulp.watch(dev + 'js/main.js', ['scripts'])

    // Buat server livereload
    livereload.listen({
        port: 9000,
    });
    gulp.watch(['**/*']).on('change', livereload.changed);
    gulp.watch(['../../laravel4/app/views/**/*.blade.php']).on('change', livereload.changed);
})

gulp.task('default', function() {
    gulp.start('styles');
    gulp.start('scripts');
});
