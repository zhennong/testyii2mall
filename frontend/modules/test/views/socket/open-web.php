<?php
use yii\bootstrap\Html;
?>

<div class="test-socket-open-web">
    <h1><?= $this->context->action->uniqueId ?></h1>

    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>

    <p>
        <?php var_dump(file_get_contents('http://wodrow.front.yii2mall.cn/')) ?>
    </p>
</div>
