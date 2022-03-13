<?php
namespace app\modules\receipt\components\Repository;

use app\modules\receipt\components\Exceptions\DeleteException;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesRepository;
use app\modules\receipt\models\ReceiptTemplates;
use yii\data\ActiveDataProvider;
use yii\db\Exception;

class ReceiptTemplatesRepository implements IReceiptTemplatesRepository
{
    /**
     * @param int $id
     * @return ?ReceiptTemplates
     */
    public function getReceiptTemplateById(int $id): ?ReceiptTemplates
    {
        return ReceiptTemplates::findOne($id);
    }

    /**
     * @param array $dataReceiptTemplate
     * @return bool
     */
    public function updateReceiptTemplates(array $dataReceiptTemplate): bool
    {
        $receiptTemplate = ReceiptTemplates::findOne($dataReceiptTemplate['id']);

        $receiptTemplate->setAttributes($dataReceiptTemplate);
        if ($receiptTemplate->validate()) {
            try{
                $receiptTemplate->save();
                return true;
            } catch (Exception $exception) {
                echo $exception;
                return false;
            }
        }

        return false;
    }

    /**
     * @return ActiveDataProvider
     */
    public function getListReceiptTemplates(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => ReceiptTemplates::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
    }

    /**
     * @param int $id
     * @return int
     * @throws \yii\base\Exception
     */
    public function deleteTemplateById(int $id): int
    {
        $status = ReceiptTemplates::deleteAll(['id' => $id]);
        if ($status === 1) {
            return 1;
        }
        throw new DeleteException('При удалении произошла ошибка');
    }

    public function addNewTemplate(array $data): int
    {
        $receiptTemplate = new ReceiptTemplates();
        $receiptTemplate->setAttributes($data);
        if ($receiptTemplate->save()) {
            return 1;
        }

        return 0;
    }
}
