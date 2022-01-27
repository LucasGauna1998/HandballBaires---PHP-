
const { src, dest, watch, parallel } = require ('gulp');

const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');


// OPTIMIZACION DE IMAGENES
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const avif = require('gulp-avif');


// CSS

const cssmin = require('gulp-cssmin');





const paths = {
    img : 'src/img/**/*.{png,jpg}',
    js : 'src/js/*.js',
    scss : 'src/scss/**/*.scss',
}

function css ( done ) {
    src( paths.scss ) // Elegimos el Directorio de SCSS
        .pipe( plumber() )
        .pipe( sass() ) // Convertimos en SCSS
        .pipe( postcss( [ autoprefixer(), cssnano() ] ) )
        .pipe( dest( 'build/css' ) ) // Seleccionamos el directorio en el que vamos a alamecenar los cambios
    done();
}
function versionAvif( done ) {
    const opciones = {
    quality: 50
    };
    src('src/img/**/*.{png,jpg}')
        .pipe( avif() )
        .pipe( dest('build/img') )
    done();

}


function imagenes ( done ) {
    const opciones = {
        optimizationLevel : 3
    };

    src( paths.img )
        .pipe( cache (imagemin( opciones ) ))
        .pipe( dest ('build/img' ) );
    done();

}

// function cssMin (){ 
//     src ('/build')
// }

function versionWebp ( done ) {
    const opciones = {
        quality : 50
    };
    src ( paths.img )
        .pipe( webp( opciones ) )
        .pipe( dest('build/img'));

    done();
}



function js( done ) {
    src ( paths.js )
        .pipe( dest ('build/js') );

    done();
}
function dev( done ){
    watch( paths.scss, css );
    watch( paths.js, js );
    done();
    
}
exports.versionAvif = versionAvif;
exports.css = css;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.dev = dev;

exports.dev = parallel(imagenes, versionAvif, versionWebp, dev);