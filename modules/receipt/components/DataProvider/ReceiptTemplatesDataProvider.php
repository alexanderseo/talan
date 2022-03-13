<?php
namespace app\modules\receipt\components\DataProvider;

use app\modules\receipt\components\Interfaces\IReceiptTemplatesDataProvider;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesRepository;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesService;
use app\modules\receipt\components\Service\ReceiptTemplatesService;
use yii\data\ActiveDataProvider;

class ReceiptTemplatesDataProvider implements IReceiptTemplatesDataProvider
{
    /**
     * @var IReceiptTemplatesRepository
     */
    private $repository;

    /**
     * @var IReceiptTemplatesService
     */
    private $service;

    public function __construct(IReceiptTemplatesRepository $repository, IReceiptTemplatesService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @param array $dataForm
     * @param int $id
     * @return bool
     */
    public function updateReceiptTemplates(array $dataForm, int $id): bool
    {
        $resultService = $this->service->changeKeysOfArray($dataForm, $id);

        return $this->repository->updateReceiptTemplates($resultService);
    }

    /**
     * @return ActiveDataProvider
     */
    public function getListReceiptTemplates(): ActiveDataProvider
    {
        return $this->repository->getListReceiptTemplates();
    }

    /**
     * @param array $data
     * @return int
     */
    public function addTemplate(array $data): int
    {
        $receiptTemplate = $this->service->prepareKeysForSaving($data);

        return $this->repository->addNewTemplate($receiptTemplate);
    }
}