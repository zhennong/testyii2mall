<?php

namespace frontend\modules\show;

/**
 * show module definition class
 */
class Show extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\show\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->layout = 'main.php';
        parent::init();

    }
}
