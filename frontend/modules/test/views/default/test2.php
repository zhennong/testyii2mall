<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/22
 * Time: 17:14
 */
use kartik\helpers\Html;

$this->title = 'test2';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-default-test2">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
