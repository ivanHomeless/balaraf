const server = require("browser-sync").create();
const gulp = require("gulp");
const sass = require("gulp-sass");
const plumber = require("gulp-plumber");
const minify = require("gulp-csso");
const babel = require("gulp-babel");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const postcss = require("gulp-postcss");
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps");
const autoprefixer = require("autoprefixer");


gulp.task("style", function() {
    return gulp.src("source/sass/style.scss")
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: "expanded"}).on("error", sass.logError))
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(gulp.dest("build/css"))
        .pipe(minify())
        .pipe(rename({ suffix: ".min" }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest("public/css"))
        .pipe(server.stream());
});

gulp.task("js-libs", function() {
    return gulp.src([
        "./node_modules/jquery/dist/jquery.min.js",
        "./node_modules/bootstrap/dist/js/bootstrap.min.js"
    ])
        .pipe(concat("libs.js"))
        .pipe(gulp.dest("public/js"))
        .pipe(server.stream());
});

gulp.task("script", function() {
    return gulp.src([
        "source/js/**/*.js"
    ])
        .pipe(gulp.dest("build/js"))
        .pipe(babel({
            presets: ["@babel/env"]
        }))
        .pipe(uglify())
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest("public/js"))
        .pipe(server.stream());
});

gulp.task("serve",  function() {
    server.init({
        server: "public/"
    });

    gulp.watch("source/sass/**/*.{scss, sass}", gulp.parallel("style"));
    gulp.watch("source/js/**/*.js", gulp.parallel("script"));

});

gulp.task(gulp.series(["js-libs", "style", "script"]));
