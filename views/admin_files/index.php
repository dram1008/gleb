<?php

use yii\helpers\Url;
use app\services\GsssHtml;
use yii\helpers\Html;

$this->title = 'Статьи';

$this->registerJs(<<<JS
$('.buttonDelete').click(function (e) {
        e.preventDefault();
        if (confirm('Подтвердите удаление')) {
            var b = $(this);
            var id = $(this).data('id');
            ajaxJson({
                url: '/admin/files/' + id + '/delete',
                success: function (ret) {
                    showInfo('Успешно', function() {
                        b.parent().parent().remove();
                    });
                }
            });
        }
    });
JS
);
?>

<div class="container">
    <div class="page-header">
        <h1>Фото</h1>
    </div>


    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query'      => \app\models\File::query(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]),
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'columns'      => [
            'id',
            [
                'header'  => 'Картинка',
                'content' => function ($item) {
                    return Html::a(Html::img($item['file'], [
                        'class' => 'thumbnail',
                        'width' => 80,
                        'style' => 'margin-bottom: 0px;',

                    ]), ['admin_files/edit', 'id' => $item['id']]);
                },
            ],
            [
                'header'  => 'Название',
                'content' => function ($item) {
                    return Html::a($item['title'], ['admin_files/edit', 'id' => $item['id']]);
                },
            ],
            [
                'header'  => 'Удалить',
                'content' => function ($item) {
                    return Html::button('Удалить', [
                        'class'   => 'btn btn-danger btn-xs buttonDelete',
                        'data-id' => $item['id'],
                    ]);
                },
            ]
        ],
    ]) ?>
    <a href="<?= Url::to(['admin_files/add']) ?>" class="btn btn-default">Добавить</a>


</div>