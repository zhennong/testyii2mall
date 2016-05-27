<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\persons\models\ReceiptAddress */

$this->title = 'Create Receipt Address';
$this->params['breadcrumbs'][] = ['label' => 'Receipt Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
