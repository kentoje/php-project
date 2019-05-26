const { series, parallel, src, dest, watch } = require('gulp');
const sass = require('gulp-sass');
const cssnano = require('gulp-cssnano');
const gulpif = require('gulp-if');
const autoprefixer = require('gulp-autoprefixer');
const pxtorem = require('gulp-pxtorem');
const minify = require('gulp-minify');
const replace = require('gulp-replace');
const prod = process.env.NODE_ENV === 'prod';

function php() {
  return src('src/index.php')
    .pipe(replace("scss", "css"))
      .pipe(dest("dist"));
}

function pages() {
  return src('src/pages/**/*')
    .pipe(dest('dist/pages'))
}

function fonts() {
  return src('src/fonts/**/*')
    .pipe(dest('dist/fonts'));
}

function css() {
  return src('src/scss/style.scss')
    .pipe(sass())
      .pipe(pxtorem())
        .pipe(gulpif(prod, cssnano()))
          .pipe(gulpif(prod, autoprefixer({ browsers: ['last 2 versions'], cascade: false })))
            .pipe(dest('dist/css'));
}

function js() {
  return src('src/js/**/*')
    .pipe(minify())
      .pipe(dest('dist/js'));
}

function images() {
  return src('src/img/**/*')
    .pipe(dest('dist/img'));
}

exports.dev = series(parallel(php, css, js, images, fonts, pages), () =>
  watch((['./src/index.php', './src/scss/**/*.scss', './src/js/**/*.js']), series(parallel(php, css, js, images, fonts, pages)))
);
exports.build = series(php, css, js, images, fonts, pages);