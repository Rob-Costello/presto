var gulp = require('gulp'),
    util = require('gulp-util'),
    webp = require('gulp-webp');

var config = {
    production: !!util.env.production
};

if(!config.production){
    var gzip = require('gulp-gzip'),
        sass = require('gulp-sass'),
        concat = require('gulp-concat'),
        uglify = require('gulp-uglify'),
        uglifycss = require('gulp-uglifycss'),
        browserSync = require('browser-sync'),
        reload = browserSync.reload;
}

var paths = {
    'bower': './bower_components',
    'assets': './wordpress/assets',
    'secure_assets': './presto/assets',
    'plugins': './web/wp-content/plugins'
};

gulp.task('styles', function() {
    return gulp.src([
        paths.assets + '/styles/app.scss',
        paths.plugins + '/woocommerce/assets/css/woocommerce.css',
        paths.plugins + '/woocommerce/assets/css/select2.scss',
        paths.plugins + '/woocommerce/assets/css/woocommerce-layout.css',
        paths.plugins + '/woocommerce-subscriptions/assets/css/checkout.css',
        paths.plugins + '/gravityforms/css/formreset.css',
        paths.plugins + '/gravityforms/css/formsmain.css',
        paths.plugins + '/gravityforms/css/readyclass.css',
        paths.plugins + '/gravityforms/css/browsers.css',
    ])
        .pipe(sass({
            includePaths: [
                paths.bower + '/foundation-sites/scss'
            ]
        }))
        .pipe(concat('style.css'))
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": false
        }))
        .pipe(gulp.dest('./web/wp-content/themes/core/'))
        .pipe(browserSync.stream());
});

gulp.task('scripts', function() {
    gulp.src([
        paths.bower + '/jquery/dist/jquery.js',
        paths.bower + '/foundation-sites/dist/js/foundation.js',
        paths.plugins + '/woocommerce/assets/js/frontend/add-to-cart.min.js',
        paths.plugins + '/woocommerce/assets/js/select2/select2.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/password-strength-meter.min.js',
        paths.plugins + '/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/woocommerce.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/country-select.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/address-i18n.min.js',
        paths.plugins + '/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/cart-fragments.min.js',
        paths.plugins + '/woocommerce/assets/js/frontend/checkout.min.js',
        paths.bower + '/sequencejs/scripts/imagesloaded.pkgd.min.js',
        paths.bower + '/sequencejs/scripts/hammer.min.js',
        paths.bower + '/sequencejs/scripts/sequence.min.js',
        paths.assets + '/scripts/sequencejs/basic.js',
        paths.assets + '/scripts/app.js',
    ])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./web/wp-content/themes/core/js'));

    return gulp.src(paths.bower + '/modernizr/modernizr.js')
        .pipe(uglify())
        .pipe(gulp.dest('./web/wp-content/themes/core/js'))
        .pipe(browserSync.stream());
});

gulp.task('secure_styles', function() {
    gulp.src([
        paths.bower + '/bootstrap/dist/css/bootstrap.css',
        paths.bower + '/jsgrid/css/jsgrid.css',
        paths.bower + '/jsgrid/css/theme.css',
        paths.bower + '/datetimepicker/jquery.datetimepicker.css',
        paths.bower + '/dropify/dist/css/dropify.css',
        paths.bower + '/select2/dist/css/select2.min.css',
        paths.bower + '/switchery/dist/switchery.min.css',
        paths.secure_assets + '/styles/material-design-iconic.min.css',
        paths.secure_assets + '/styles/admintemplate/animate.css',
        paths.secure_assets + '/styles/admintemplate/style.css',
        paths.secure_assets + '/styles/admintemplate/colors/default.css'
    ])
        .pipe(concat('base.css'))
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": false
        }))
        .pipe(gulp.dest('./web/presto/assets/css'));

    return gulp.src([
        paths.secure_assets + '/styles/secure.scss'
    ])
        .pipe(concat('secure.css'))
        .pipe(uglifycss({
            "maxLineLen": 80,
            "uglyComments": false
        }))
        .pipe(gulp.dest('./web/presto/assets/css'))
        .pipe(browserSync.stream());
});

gulp.task('secure_scripts', function() {
    gulp.src([
        paths.bower + '/jquery/dist/jquery.js',
        paths.bower + '/bootstrap/dist/js/bootstrap.min.js',
        paths.bower + '/bootstrap-select/dist/js/bootstrap-select.min.js',
        paths.bower + '/metisMenu/dist/metisMenu.js',
        paths.bower + '/waypoints/lib/jquery.waypoints.js',
        paths.bower + '/counterup/jquery.counterup.min.js',
        paths.bower + '/raphael/raphael-min.js',
        paths.bower + '/morris.js/morris.js',
        paths.bower + '/jsgrid/src/jsgrid.min.js',
        paths.bower + '/jsgrid/src/jsgrid.core.js',
        paths.bower + '/jsgrid/src/jsgrid.load-indicator.js',
        paths.bower + '/jsgrid/src/jsgrid.load-strategies.js',
        paths.bower + '/jsgrid/src/jsgrid.sort-strategies.js',
        paths.bower + '/jsgrid/src/jsgrid.field.js',
        paths.bower + '/jsgrid/src/fields/jsgrid.field.text.js',
        paths.bower + '/jsgrid/src/fields/jsgrid.field.number.js',
        paths.bower + '/jsgrid/src/fields/jsgrid.field.select.js',
        paths.bower + '/jsgrid/src/fields/jsgrid.field.checkbox.js',
        paths.bower + '/jsgrid/src/fields/jsgrid.field.control.js',
        paths.bower + '/datetimepicker/jquery.datetimepicker.min.js',
        paths.bower + '/datetimepicker/build/jquery.datetimepicker.full.min.js',
        paths.bower + '/dropify/dist/js/dropify.min.js',
        paths.bower + '/select2/dist/js/select2.min.js',
        paths.bower + '/jquery.repeater/jquery.repeater.min.js',
        paths.bower + '/chained/jquery.chained.min.js',
        paths.bower + '/switchery/dist/switchery.min.js',
        paths.secure_assets + '/scripts/secure/jsgrid/db.js',
        paths.secure_assets + '/scripts/secure/jsgrid/jsgrid-init.js',
        paths.secure_assets + '/scripts/secure/jquery.slimscroll.js',
        paths.secure_assets + '/scripts/secure/waves.js',
        paths.secure_assets + '/scripts/secure/cbpFWTabs.js',
        paths.secure_assets + '/scripts/secure/custom.js',
        paths.secure_assets + '/scripts/secure.js'
    ])
        .pipe(concat('secure.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./web/presto/assets/js'));

    return gulp.src(paths.bower + '/modernizr/modernizr.js')
        .pipe(uglify())
        .pipe(gulp.dest('./web/presto/assets/js'))
        .pipe(browserSync.stream());
});

gulp.task('watch', function() {
    browserSync.init({
        proxy: "rewardtagz.dev"
    });
    gulp.watch(paths.assets + '/styles/**/*.scss', ['styles'], browserSync.reload);
    gulp.watch(paths.assets + '/scripts/**/*.js', ['scripts'], browserSync.reload);
    gulp.watch("web/wp-content/themes/core/*.php").on('change', browserSync.reload);
    gulp.watch("presto/views/*").on('change', browserSync.reload);
});

if( !config.production ) {
    gulp.task('default', ['styles', 'scripts']);
} else {
    gulp.task('default', function () {

        gulp.src(['web/**/*.{jpg,jpeg,png}'])
            .pipe(webp())
            .pipe(gulp.dest('web/images/'));

    });
}