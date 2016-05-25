<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\cat\models\Cat */

$this->title = 'Update Cat: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
