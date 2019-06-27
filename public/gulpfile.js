var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var sass = require('gulp-sass');
var assetVersion = require('gulp-asset-version');
const rev = require('gulp-rev');

gulp.task('scripts', function(){
	return gulp.src([
        './assets/plugins/jquery-3.1.0.min.js',
        './assets/plugins/bootstrap/js/bootstrap.min.js',

        './assets/plugins/match-media/matchMedia.js',
        './assets/plugins/match-media/matchMedia.addListener.js',
        './assets/plugins/match-height/jquery.matchHeight-min.js',

        // './assets/plugins/light-gallery/js/lightgallery-all.min.js',
        
        './assets/js/main.js',
        './assets/js/scripts.js',
    ])
	.pipe(concat('mcorp.min.js'))
	.pipe(uglify())
    .pipe(rev())
	.pipe(gulp.dest('assets/build/'))
});

gulp.task('sass', function () {
  return gulp.src('./assets/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css/'));
});

gulp.task('styles', function() {
	return gulp.src([
        './assets/plugins/bootstrap/css/bootstrap.min.css',
        './assets/plugins/bootstrap/css/bootstrap-theme.min.css',
        './assets/plugins/font-awesome/css/font-awesome.min.css',
        './assets/sass/**/*.scss',

    ])
	.pipe(sass().on('error', sass.logError))
	.pipe(concat('mcorp.min.css'))
	.pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(rev())
	.pipe(gulp.dest('assets/build/'))
});

gulp.task('watch',function() {
	gulp.watch('./assets/sass/**/*.scss', ['styles']);
	// gulp.watch('./assets/**/*.css', ['styles']);
	// gulp.watch('./assets/**/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);