<?php

use app\modules\receipt\models\ReceiptTemplates;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
/**
 * @var $model ReceiptTemplates
 */
?>
<div class="post">
    <h2><?= Html::encode($model->title_template) ?></h2>

    <?= HtmlPurifier::process($model->file_name) ?>
</div>