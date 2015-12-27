<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Фотографии';

\app\assets\LightBox\Asset::register($this);
$this->registerJs("initLightbox();");
$this->registerJs("lightBoxPath = '" .Yii::$app->assetManager->getBundle('\app\assets\LightBox\Asset')->baseUrl . "';",\yii\web\View::POS_HEAD);
?>
<div class="box">

    <h1 class="title"><?= $this->title ?></h1>

    <?php foreach(\app\models\File::query()->all( ) as $foto) { ?>
        <div class="foto" style="display: inline-block; margin: 10px;">
            <a href="<?= \cs\Widget\FileUpload2\FileUpload::getOriginal($foto['file']) ?>" rel="lightbox[example]">
                <img src="<?= $foto['file'] ?>">
            </a>
        </div>
    <?php } ?>

    <div class="clear"></div>

</div>

