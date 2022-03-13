<?php
use app\modules\receipt\models\ReceiptTemplatesForm;
use yii\widgets\DetailView;

/**
 * @var $receiptTemplatesForm ReceiptTemplatesForm
 */
$this->title = $receiptTemplatesForm->fileName;
$this->registerMetaTag(['name' => 'description', 'content' => $receiptTemplatesForm->fileName]);
?>
<?php
echo DetailView::widget([
    'model' => $receiptTemplatesForm,
    'attributes' => [
        'titleTemplate',
        'fileName',
    ],
]);
