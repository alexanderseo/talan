<?php
namespace app\modules\receipt\components\Interfaces;

interface IReceiptTemplatesService
{
    /**
     * Создаем массив значений для модели ReceiptTemplates.
     * @param array $data
     * @param int $id
     * @return array
     */
    public function changeKeysOfArray(array $data, int $id): array;

    public function prepareKeysForSaving(array $data): array;
}
