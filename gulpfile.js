import { src, dest, watch, series } from 'gulp'
import * as dartSass from 'sass'
import gulpSass from 'gulp-sass'
import terser from 'gulp-terser'
import plumber from "gulp-plumber"; // Importa gulp-plumber

const sass = gulpSass(dartSass);



const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
}


export function css( done ) {
    src(paths.scss, {sourcemaps: true})
        .pipe(plumber()) // Usa plumber para manejar errores sin detener Gulp
        .pipe( sass({
            outputStyle: 'compressed',
            silenceDeprecations: ['legacy-js-api'] // pronto se actulaizara la API de SASS CUIDADO !!!!
        }).on('error', sass.logError) )
        .pipe( dest('./public/build/css', {sourcemaps: '.'}) );
    done()
}

export function js( done ) {
    src(paths.js)
      .pipe(terser())
      .pipe(dest('./public/build/js'))
    done()
}

export function dev() {
    watch( paths.scss, css );
    watch( paths.js, js );
}

export default series( js, css, dev )