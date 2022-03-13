<?php
namespace app\modules\receipt\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $file_name
 * @property string $title_template
 * @property int $deleted
 */
class ReceiptTemplates extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%receipt_templates}}';
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID шаблона',
            'file_name' => 'Название файла шаблона',
            'title_template' => 'Заголовок шаблона',
            'deleted' => 'Статус'
        ];
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['file_name', 'title_template'], 'required', 'message' => 'Please choose a name.'],
            [['file_name', 'title_template'], 'string'],
            [['deleted'], 'in', 'range' => [0, 1]]
        ];
    }


}