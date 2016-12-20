var gulp = require('gulp');
var concat = require('gulp-concat');
var yui = require('gulp-yuicompressor');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var purify = require('gulp-purifycss');
var uglifycss = require('gulp-uglifycss');
var resolveDependencies = require('gulp-resolve-dependencies');
var del = require('del');

var paths = {
	html: ['views/**/*.php', 'views/**/*.html', 'standardelements/*'],
	scripts: ['assets/js/*.js'],
	scriptManifest: ['assets/manifest.js'],
	css: ['assets/css/*.css']
}


gulp.task('clean', function() {

  return del(['build/js', 'build/css/all.css']);
});

gulp.task('scripts', ['clean'], function() {
  // Minify and copy all JavaScript
  return gulp.src(paths.scriptManifest)
  	  .pipe(resolveDependencies({
      pattern: /\* @requires [\s-]*(.*\.js)/g
    }))
      .pipe(concat('all.min.js'))
      .pipe(uglify())
    .pipe(gulp.dest('build/js'));
});


gulp.task('css', ['clean'], function(){
	return gulp.src(paths.css)
		//.pipe(purify(['views/**/*.php', 'views/**/*.html', 'standardelements/*']))
		.pipe(uglifycss({
			"uglycomments": true
		}))
		.pipe(concat('all.css'))
		.pipe(gulp.dest('build/css'));
});


gulp.task('default', ['clean', 'scripts', 'css']);