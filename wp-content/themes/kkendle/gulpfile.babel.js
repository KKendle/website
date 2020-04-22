import autoprefixer from 'autoprefixer';
import browserSync from "browser-sync";
import cleanCss from 'gulp-clean-css';
import del from 'del';
import gulpif from 'gulp-if';
import gulpStylelint from 'gulp-stylelint';
import imagemin from 'gulp-imagemin';
import notify from 'gulp-notify';
import plumber from 'gulp-plumber';
import postcss from 'gulp-postcss';
import sass from 'gulp-dart-sass';
import sassdoc from 'sassdoc';
import sourcemaps from 'gulp-sourcemaps';
import webpack from 'webpack-stream';
import yargs from 'yargs';
import { src, dest, watch, series, parallel } from 'gulp';

// const PRODUCTION = yargs.argv.prod;
const PRODUCTION = true;

/**
 * Custom Error Handler.
 *
 * @param Mixed err
 */
const errorHandler = r => {
	notify.onError( '\n\n❌  ===> ERROR: <%= error.message %>\n' )( r );

	// this.emit('end');
};

// STYLES
export const styles = () => {
  return src('assets/scss/**/*.scss')
    .pipe(plumber(errorHandler))
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer ]))
    .pipe(cleanCss())
    .pipe(sourcemaps.write())
    .pipe(dest('dist/css'));
}

// DOCUMENT SASS WITH SASSDOCS
export const sassdocs = () => {
  return src('assets/scss/**/*.scss')
    .pipe(sassdoc());
}

// LINT CSS WITH STYLELINT
export const lintcss = () => {
  return src('assets/scss/**/*.scss')
    .pipe(plumber(errorHandler))
    .pipe(gulpStylelint({
      reporters: [
        {formatter: 'string', console: true}
      ]
    }));
}

// IMAGES MOVE AND MINIFICATION
export const images = () => {
  return src('assets/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(plumber(errorHandler))
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
}

// COPY FILES
export const copy = () => {
  return src(['assets/**/*','!assets/{images,js,scss}','!assets/{images,js,scss}/**/*'])
    .pipe(dest('dist'));
}

// DELETE FILES
export const clean = () => {
  return del(['dist']);
}

// JS
export const scripts = () => {
  return src('assets/js/main.js')
  .pipe(plumber(errorHandler))
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: 'main.js'
    },
  }))
  .pipe(dest('dist/js'));
}

// REFRESH BROWSER ON FILE CHANGE
// const server = browserSync.create();
// export const serve = done => {
//   server.init({
//     proxy: LOCALHOST
//   });
//   done();
// };
// export const reload = done => {
//   server.reload();
//   done();
// };

// WATCH FOR CHANGED FILES
export const watchForChanges = () => {
  watch('assets/scss/**/*.scss', styles);
  watch('assets/scss/**/*.scss', sassdocs);
  watch('assets/scss/**/*.scss', lintcss);
  watch('assets/images/**/*.{jpg,jpeg,png,svg,gif}', images);
  watch(['assets/**/*','!assets/{images,js,scss}','!assets/{images,js,scss}/**/*'], copy);
  watch('assets/js/**/*.js', scripts);
}

export const dev = series(clean, parallel(styles, images, copy, scripts), sassdocs, lintcss, watchForChanges);
export const devbuild = series(clean, parallel(styles, images, copy, scripts), sassdocs, lintcss);
export const prod = series(clean, parallel(styles, images, copy, scripts));
export default devbuild;

