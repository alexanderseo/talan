<?php
namespace app\modules\receipt\components\ServiceFactory;

use app\modules\receipt\components\Interfaces\IReceiptTemplatesDataProvider;
use app\modules\receipt\components\Repository\ReceiptTemplatesRepository;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesRepository;
use app\modules\receipt\components\DataProvider\ReceiptTemplatesDataProvider;
use app\modules\receipt\components\Service\ReceiptTemplatesService;
use app\modules\receipt\models\ReceiptTemplatesForm;
use JetBrains\PhpStorm\Pure;

class ServiceFactory
{
    /**
     * @return IReceiptTemplatesRepository
     */
    #[Pure]
    public static function getReceiptTemplatesRepository(): IReceiptTemplatesRepository
    {
        return new ReceiptTemplatesRepository();
    }

    /**
     * @return ReceiptTemplatesForm
     */
    public static function getReceiptTemplatesForm(): ReceiptTemplatesForm
    {
        return new ReceiptTemplatesForm();
    }

    /**
     * @return IReceiptTemplatesDataProvider
     */
    #[Pure]
    public static function getReceiptTemplatesDataProvider(): IReceiptTemplatesDataProvider
    {
        $repository = new ReceiptTemplatesRepository();
        $service = new ReceiptTemplatesService();
        return new ReceiptTemplatesDataProvider($repository, $service);
    }
}