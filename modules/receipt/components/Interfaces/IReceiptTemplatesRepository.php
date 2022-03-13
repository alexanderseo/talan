<?php
namespace app\modules\receipt\components\Interfaces;

use app\modules\receipt\models\ReceiptTemplates;
use yii\data\ActiveDataProvider;

interface IReceiptTemplatesRepository
{
    /**
     * Получаем шаблон по ID.
     * @param int $id
     * @return ?ReceiptTemplates
     */
    public function getReceiptTemplateById(int $id): ?ReceiptTemplates;

    /**
     * Обновляем данные шаблона.
     * @param array $dataReceiptTemplate
     * @return bool
     */
    public function updateReceiptTemplates(array $dataReceiptTemplate): bool;

    /**
     * Формируем список шаблонов для виджета.
     * @return ActiveDataProvider
     */
    public function getListReceiptTemplates(): ActiveDataProvider;

    public function deleteTemplateById(int $id): int;

    public function addNewTemplate(array $data): int;
}