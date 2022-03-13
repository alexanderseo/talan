<?php

use app\modules\receipt\models\ReceiptTemplatesForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * @var $receiptTemplatesForm ReceiptTemplatesForm
 */
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($receiptTemplatesForm, 'titleTemplate')->textInput(['class'=>'form-control']) ?>
<?= $form->field($receiptTemplatesForm, 'fileName')->textInput(['class'=>'form-control']) ?>
<?= $form->field($receiptTemplatesForm, 'deleted')->checkbox() ?>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
