<?php

use yii\db\Migration;

class m160501_104918_alter_menu_add_field_icon extends Migration
{
    public function up()
    {
        $this->addColumn("{{%menu}}", 'icon', 'string(50)');
    }

    public function down()
    {
        $this->dropColumn("{{%menu}}", 'icon');
    }
}
