<?php

use yii\db\Migration;

/**
 * Handles the creation for table `goods`.
 */
class m160519_035932_goods extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods', [
            'id'     => $this->primaryKey(),
            'cat_id'       => $this->integer()->notNull(),                    //所属栏目
            'name'   => $this->string()->notNull(),                     //商品名
            'shop_price'   => $this->integer()->notNull(),                    //商品价格
            'number' => $this->integer()->notNull()->defaultValue(0),   //商品数量
            'desc'   => $this->text()->notNull()->defaultValue(''),     //商品描述
            'img'    => $this->string()->notNull(),                     //商品原图
            'xthumb'  => $this->string()->notNull(),                    //商品缩略小图
            'dthumb'  => $this->string()->notNull(),                    //商品缩略小图
            'status' => $this->integer()->notNull()->defaultValue(0),         //状态
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('goods');
    }
}
