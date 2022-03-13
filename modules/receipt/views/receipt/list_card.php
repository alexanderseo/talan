<?php

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
/**
 * @var $dataProvider ActiveDataProvider
 */
?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_receipt_template',
]);