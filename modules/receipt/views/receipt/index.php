<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/**
 * @var $dataProvider ActiveDataProvider
 */
?>
<?php
echo "<h1>Шаблоны</h1>";

echo Html::beginTag('a', ['class' => 'btn btn-primary', 'href' => 'receipt/add']);
echo 'Добавить';
echo Html::endTag('a');

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a($data['id'], '/receipt/receipt/view?id=' .  $data['id']);
            }],
        'file_name',
        'title_template',
        [
            'class' => 'yii\grid\DataColumn',
            'header' => 'Статус',
            'value' => function ($data) {
                return $data['deleted'] === 0 ? 'Активен' : 'Удален';
            },
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);