<?php

use yii\db\Migration;

class m160531_090144_order_goods extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%order_goods}}', [
            'id' => $this->primaryKey(6),
            'order_id'=>$this->integer()->notNull(),
            'goods_id'=>$this->integer()->notNull(),
            'goods_name'=>$this->string(),
            'goods_price'=>$this->float(2)->notNull(),
            'total'=>$this->integer()->notNull()->defaultValue(1), //数量
            'amount'=>$this->float(2)->notNull(),
            'add_time'=>$this->integer()->notNull(),
            'update_time'=>$this->integer()->notNull(),
            'CONSTRAINT order_has_goods FOREIGN KEY (order_id) REFERENCES {{%order}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160531_090144_order_goods cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
