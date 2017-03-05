var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

// Static server
gulp.task('serve', ['styles'], function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });

    gulp.watch("css/*.scss", ['styles']);
    gulp.watch("css/*").on('change', browserSync.reload);
    gulp.watch("js/*").on('change', browserSync.reload);
    gulp.watch("*").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('styles', function() {
    return gulp.src('css/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('.'))
});

gulp.task('default', ['serve']);