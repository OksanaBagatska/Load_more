const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

gulp.task('styles', function() {
    return gulp.src('assets/css/**/*.scss')
        .pipe(sass())
        .pipe(concat('styles.css'))
        .pipe(gulp.dest('dist/css'));
});

gulp.task('scripts', function() {
    return gulp.src('assets/js/**/*.js')
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

gulp.task('default', gulp.parallel('styles', 'scripts'));
