'use strict';

var gulp = require('gulp');
var elixir = require('laravel-elixir');
var sass = require('gulp-sass');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});

 
gulp.task('sass:watch', function () {
  gulp.watch('./sass/**/*.scss', ['sass']);
});

gulp.task('sass', function () {

  return gulp.src('./sass/**/*.scss')

  	.pipe(sourcemaps.init())

    .pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	
	.pipe(sourcemaps.write())

    .pipe(gulp.dest('./css'));

    
});