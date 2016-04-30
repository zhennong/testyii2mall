<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
$this->title = '';
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/validate-email', 'email'=>$user->email, 'token' => $user->password_reset_token]);
?>
Hello <?= $user->username ?>,

Click the link below to enable your account:

<?= $resetLink ?>
