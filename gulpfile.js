import path from 'path';
import fs from 'fs/promises';  // Usamos fs/promises para mejor manejo de async/await
import { glob } from 'glob';
import { src, dest, watch, series } from 'gulp';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import terser from 'gulp-terser';
import sharp from 'sharp';

const sass = gulpSass(dartSass);

const paths = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    img: 'src/img/**/*.{png,jpg,jpeg,svg,webp,avif}'
};

// CSS: Compila SASS a CSS comprimido
export function css() {
    return src(paths.scss, { sourcemaps: true })
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(dest('./public/build/css', { sourcemaps: '.' }));
}

// JS: Minifica archivos JavaScript
export function js() {
    return src(paths.js)
        .pipe(terser())
        .pipe(dest('./public/build/js'));
}

// IMG: Procesa imágenes (optimiza + genera formatos modernos)
export async function imagenes() {
    const files = await glob(paths.img);
    await Promise.all(
        files.map(async (file) => {
            const outputDir = path.join(
                './public/build/img',
                path.relative('./src/img', path.dirname(file))
            );
            await procesarImagen(file, outputDir);
        })
    );
}

async function procesarImagen(file, outputDir) {
    try {
        await fs.mkdir(outputDir, { recursive: true });
        const ext = path.extname(file).toLowerCase();
        const baseName = path.basename(file, ext);

        if (ext === '.svg') {
            await fs.copyFile(file, path.join(outputDir, `${baseName}${ext}`));
        } else {
            const options = { quality: 80 };
            await Promise.all([
                sharp(file).jpeg(options).toFile(path.join(outputDir, `${baseName}.jpg`)),
                sharp(file).webp(options).toFile(path.join(outputDir, `${baseName}.webp`)),
                sharp(file).avif().toFile(path.join(outputDir, `${baseName}.avif`))
            ]);
        }
    } catch (error) {
        console.error(`Error procesando ${file}:`, error);
    }
}

// Dev: Observa cambios en archivos
export function dev() {
    watch(paths.scss, css);
    watch(paths.js, js);
    watch(paths.img, imagenes);
}

// Tarea por defecto
export default series(js, css, imagenes, dev);