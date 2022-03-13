<?php
namespace app\modules\receipt\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class TemplateWidget extends Widget
{
    public $templates;

    public function init()
    {
        parent::init();
        if ($this->templates === null) {
            $this->templates = 'Список пуст';
        }
    }

    public function run()
    {
        return Html::encode($this->message);
    }
}
