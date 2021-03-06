<?php

use yii\db\Migration;

class m160531_090016_order extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(6),
            'code'=>$this->string(32)->unique()->notNull(), // 唯一标识
            'status' => $this->integer()->notNull()->defaultValue(0),
            'buyer_id'=>$this->integer()->notNull(),
            'receipt_id'=>$this->integer()->notNull(),
            'amount'=>$this->float(2)->notNull()->defaultValue(0), //订单总额
            'pay_type'=>$this->integer()->notNull()->defaultValue(0),//付款方式
            'add_time'=>$this->integer()->notNull(),
            'update_time'=>$this->integer()->notNull(),
            'pay_time'=>$this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160531_090016_order cannot be reverted.\n";

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
