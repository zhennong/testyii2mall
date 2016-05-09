<?php
use yii\bootstrap\Html;
?>

<div class="test-socket-test-fsocketopen">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <?php
            $fp = fsockopen('http://192.168.0.15/',22);
            var_dump($fp);
        ?>
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
