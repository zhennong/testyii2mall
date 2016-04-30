<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/validate-email', 'email'=>$user->email, 'token' => $user->email_validate_code]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Your account email key is : <code><?=Html::encode($user->email_validate_code) ?></code></p>

    <p>You can also click the link below to enable your account:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
