<?php
/**
 * Created by PhpStorm.
 * User: Пользователь
 * Date: 20.04.2017
 * Time: 21:19
 */

namespace app\assets;

use yii\web\AssetBundle;


class ltAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];

    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD,
    ];
}
