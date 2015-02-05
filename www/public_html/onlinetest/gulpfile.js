var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload');


gulp.task('styles', function() {
    return sass('../../laravel4/app/dev/sass/main.sass', ({ style: 'expanded' }))
        .pipe(gulp.dest('../../laravel4/app/dev/sass/css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss())
        .pipe(gulp.dest('../../laravel4/app/dev/sass/min'))
        .pipe(gulp.dest('style'))
        .pipe(notify({ message: 'Styles task selesai.' }));
});

gulp.task('watch', function() {
    gulp.watch('../../laravel4/app/dev/sass/main.sass', ['styles'])

    // Buat server livereload
    livereload.listen({
        port: 9000,
    });
    gulp.watch(['style/**']).on('change', livereload.changed);
    gulp.watch(['../../laravel4/app/views/**/*.blade.php']).on('change', livereload.changed);
})

gulp.task('default', function() {
    gulp.start('styles');
});