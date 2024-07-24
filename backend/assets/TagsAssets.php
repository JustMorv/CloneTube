<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TagsAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/tagsinput.css',
    ];
    public $js = [
        'js/tagsinput.js',
    ];

    public $depends =[
        JqueryAsset::class
    ];
}