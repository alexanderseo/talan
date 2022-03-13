<?php
namespace app\modules\receipt\components\Service;

use app\modules\receipt\components\Interfaces\IReceiptTemplatesService;
use JetBrains\PhpStorm\ArrayShape;

class ReceiptTemplatesService implements IReceiptTemplatesService
{
    /**
     * @param array $data
     * @param int $id
     * @return array
     */
    #[ArrayShape([
        'id'             => "int",
        'file_name'      => "string",
        'title_template' => "string",
        'deleted'        => "int"])]
    public function changeKeysOfArray(array $data, int $id): array
    {
        return [
            'id'             => $id,
            'file_name'      => $data['fileName'],
            'title_template' => $data['titleTemplate'],
            'deleted'        => $data['deleted']
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    #[ArrayShape([
        'id'             => null,
        'file_name'      => "string",
        'title_template' => "string",
        'deleted'        => "int"])]
    public function prepareKeysForSaving(array $data): array
    {
        return [
            'id'             => null,
            'file_name'      => $data['fileName'],
            'title_template' => $data['titleTemplate'],
            'deleted'        => $data['deleted']
        ];
    }
}