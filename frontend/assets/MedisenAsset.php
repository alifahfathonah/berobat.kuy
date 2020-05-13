<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MedisenAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css2/bootstrap.min.css',
        'css2/animate.css',
        'css2/owl.carousel.min.css',
        'css2/themify-icons.css',
        'css2/flaticon.css',
        'css2/magnific-popup',
        'css2/nice-select.css',
        'css2/slick.css',
        'css2/style.css',
    ];
    public $js = [
        'js2/jquery-1.12.1.min.js',
        'js2/popper.min.js',
        'js2/bootstrap.min.js',
        'js2/jquery.magnific-popup.js',
        'js2/swiper.min.js',
        'js2/masonry.pkgd.js',
        'js2/owl.carousel.min.js',
        'js2/jquery.nice-select.min.js',
        'js2/slick.min.js',
        'js2/jquery.counterup.min.js',
        'js2/waypoints.min.js',
        'js2/jquery.ajaxchimp.min.js',
        'js2/jquery.form.js',
        'js2/jquery.validate.min.js',
        'js2/mail-script.js',
        'js2/contact.js',
        'js2/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}