<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\authclient\OAuth2;
use yii\authclient\Collection;

class AuthsController extends FrontendController{
    public function actions(){
        return [
            'error'=>[
                'class' => 'yii\web\ErrorAction',
            ],
            'authclient' => [
                'class'=>'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }
    public function actionLoginQq(){
    }

    public function successCallback($client){
        $attributes = $client->getUserAttributes();
    }
}