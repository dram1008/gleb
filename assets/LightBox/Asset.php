<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets\LightBox;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Asset extends AssetBundle
{
    public $sourcePath = '@app/assets/LightBox/litebox-1.0';
    public $css = [
        'css/lightbox.css',
    ];
    public $js = [
        'js/prototype.lite.js',
        'js/moo.fx.js',
        'js/litebox-1.0.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
