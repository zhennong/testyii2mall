<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = Yii::t('common','testyii2mall');

?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p>
            <?=Html::a("Yii Framework","http://www.yiiframework.com",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("Yii China","http://www.yiichina.com",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("Bootstrap3","http://www.bootcss.com/",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("yii2mall back",Yii::$app->params['backUrl'],['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("yii2admin github","https://github.com/mdmsoft/yii2-admin",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("yii2-adminlte-asset","http://www.yiiframework.com/extension/yii2-adminlte-asset/",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("kartik-v github","https://github.com/kartik-v",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("kartik-v yii","http://www.yiiframework.com/user/79399/",['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
            <?=Html::a("test",Yii::$app->urlManager->createUrl("/test"),['target'=>'_blank','class'=>"btn btn-lg btn-success"]) ?>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
