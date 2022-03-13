<?php
namespace app\modules\receipt\components\Interfaces;

use yii\data\ActiveDataProvider;

interface IReceiptTemplatesDataProvider
{
    public function updateReceiptTemplates(array $dataForm, int $id);

    public function getListReceiptTemplates(): ActiveDataProvider;

    public function addTemplate(array $data): int;
}
