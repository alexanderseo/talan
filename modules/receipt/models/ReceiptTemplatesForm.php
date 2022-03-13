<?php
namespace app\modules\receipt\models;

use JetBrains\PhpStorm\ArrayShape;
use yii\base\Model;

/**
 * @property string $receiptTemplates
 */
class ReceiptTemplatesForm extends Model
{
    /**
     * @var ?int
     */
    public ?int $id;
    /**
     * @var ?string
     */
    public ?string $fileName;
    /**
     * @var ?string
     */
    public ?string $titleTemplate;
    /**
     * @var ?int
     */
    public ?int $deleted;

    public function rules(): array
    {
        return [
            [['fileName', 'titleTemplate'], 'required'],
            [['deleted'], 'in', 'range' => [0, 1]]
        ];
    }

    /**
     * @return array
     */
    #[ArrayShape([
        'titleTemplate' => "string",
        'fileName' => "string",
        'deleted' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'titleTemplate' => 'Заголовок шаблона',
            'fileName' => 'Название файла шаблона',
            'deleted' => 'Деактивировать'
        ];
    }

    /**
     * Наполняем форму данными из модели AR.
     * @param ReceiptTemplates $receiptTemplateModel
     * @return void
     */
    public function setAttributesFromObject(ReceiptTemplates $receiptTemplateModel): void
    {
        $modelArray = [
            'id'            => $receiptTemplateModel->id,
            'fileName'      => $receiptTemplateModel->file_name ?? null,
            'titleTemplate' => $receiptTemplateModel->title_template ?? null,
            'deleted'       => $receiptTemplateModel->deleted
        ];
        $this->setAttributes($modelArray);
    }

    /**
     * Создаем пустую форму, для нового шаблона.
     * @return void
     */
    public function setAttributesInit(): void
    {
        $modelArray = [
            'id'            => null,
            'fileName'      => null,
            'titleTemplate' => null,
            'deleted'       => null
        ];
        $this->setAttributes($modelArray);
    }

    public function setAttributesFromArray(array $data): void
    {
        $modelArray = [
            'id'            => null,
            'fileName'      => $data['fileName'],
            'titleTemplate' => $data['titleTemplate'],
            'deleted'       => $data['deleted']
        ];
        $this->setAttributes($modelArray);
    }
}
