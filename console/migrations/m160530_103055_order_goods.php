<?php

use yii\db\Migration;

class m160530_103055_order_goods extends Migration{
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
            'goods_name'=>$this->string(),//付款方式
            'goods_price'=>$this->float(2)->notNull(),
            'total'=>$this->integer()->notNull()->defaultValue(1),
            'amount'=>$this->float(2)->notNull(),
            'add_time'=>$this->integer()->notNull(),
            'update_time'=>$this->integer()->notNull(),
            'CONSTRAINT order_has_goods FOREIGN KEY (order_id) REFERENCES {{%order}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%order_goods}}');
    }
}
