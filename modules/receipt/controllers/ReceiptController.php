<?php
namespace app\modules\receipt\controllers;

use app\modules\receipt\components\Exceptions\DeleteException;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesDataProvider;
use app\modules\receipt\components\Interfaces\IReceiptTemplatesRepository;
use app\modules\receipt\models\ReceiptTemplatesForm;
use app\modules\receipt\components\ServiceFactory\ServiceFactory;
use JetBrains\PhpStorm\Pure;
use Yii;
use yii\web\Controller;

class ReceiptController extends Controller
{
    /**
     * Список всех шаблонов.
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = $this->getInstanceReceiptTemplatesDataProvider()->getListReceiptTemplates();

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Редактировать данные шаблона.
     * @return string
     */
    public function actionUpdate(): string
    {
        $id = Yii::$app->request->get('id');
        $receiptTemplateModel = $this->getInstanceReceiptTemplatesRepository()->getReceiptTemplateById($id);

        if ($receiptTemplateModel === null) {
            return $this->render('404');
        }

        $receiptTemplatesForm = $this->getInstanceReceiptTemplatesForm();
        $receiptTemplatesForm->setAttributesFromObject($receiptTemplateModel);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('ReceiptTemplatesForm');
            if ($this->getInstanceReceiptTemplatesDataProvider()->updateReceiptTemplates($data, $id)) {
                $receiptTemplateModel = $this->getInstanceReceiptTemplatesRepository()->getReceiptTemplateById($id);
                $receiptTemplatesForm = $this->getInstanceReceiptTemplatesForm();
                $receiptTemplatesForm->setAttributesFromObject($receiptTemplateModel);
                $this->render('update', ['receiptTemplatesForm' => $receiptTemplatesForm]);
            }
        }

        return $this->render('update', ['receiptTemplatesForm' => $receiptTemplatesForm]);
    }

    /**
     * @return string
     */
    public function actionView(): string
    {
        $id = Yii::$app->request->get('id');
        $receiptTemplateModel = $this->getInstanceReceiptTemplatesRepository()->getReceiptTemplateById($id);

        if ($receiptTemplateModel === null) {
            return $this->render('404');
        }

        $receiptTemplatesForm = $this->getInstanceReceiptTemplatesForm();
        $receiptTemplatesForm->setAttributesFromObject($receiptTemplateModel);

        return $this->render('view', ['receiptTemplatesForm' => $receiptTemplatesForm]);
    }

    /**
     * @return string
     */
    public function actionDelete(): string
    {
        $id = Yii::$app->request->get('id');
        try {
            $this->getInstanceReceiptTemplatesRepository()->deleteTemplateById($id);
            $dataProvider = $this->getInstanceReceiptTemplatesDataProvider()->getListReceiptTemplates();
            return $this->render('index', ['dataProvider' => $dataProvider]);
        } catch (DeleteException $e) {
            return $this->render('error', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Добавить данные о шаблоне
     * @return string
     */
    public function actionAdd(): string
    {
        $receiptTemplatesForm = $this->getInstanceReceiptTemplatesForm();
        $receiptTemplatesForm->setAttributesInit();

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('ReceiptTemplatesForm');
            $status = $this->getInstanceReceiptTemplatesDataProvider()->addTemplate($data);
            if ($status === 0) {

            }
        }

        return $this->render('add', ['receiptTemplatesForm' => $receiptTemplatesForm]);
    }

    /**
     * @return IReceiptTemplatesRepository
     */
    #[Pure]
    private function getInstanceReceiptTemplatesRepository(): IReceiptTemplatesRepository
    {
        return ServiceFactory::getReceiptTemplatesRepository();
    }

    /**
     * @return ReceiptTemplatesForm
     */
    private function getInstanceReceiptTemplatesForm(): ReceiptTemplatesForm
    {
        return ServiceFactory::getReceiptTemplatesForm();
    }

    /**
     * @return IReceiptTemplatesDataProvider
     */
    #[Pure]
    private function getInstanceReceiptTemplatesDataProvider(): IReceiptTemplatesDataProvider
    {
        return ServiceFactory::getReceiptTemplatesDataProvider();
    }
}
