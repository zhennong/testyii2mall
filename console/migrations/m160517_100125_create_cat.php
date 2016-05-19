<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cat`.
 */
class m160517_100125_create_cat extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cat', [
            'cat_id'     => $this->primaryKey(),                            //栏目id
            'cat_name'   => $this->string()->notNull(),                     //栏目名称
            'pid'        => $this->integer()->notNull()->defaultValue(0),   //上级id,0为顶级
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cat');
    }
}
