<?php

namespace frontend\modules\persons;

/**
 * person module definition class
 */
class Persons extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\persons\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        //自定义的默认模板
        $this->layout = 'main.php';
        parent::init();
        // custom initialization code goes here
    }
}
