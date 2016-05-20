<?php

use yii\db\Migration;

/**
 * Handles the creation for table `goods`.
 */
class m160519_035932_create_goods extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods', [
            'goods_id'     => $this->primaryKey(),
            'cat_id'       => $this->integer()->notNull(),                    //所属栏目
            'goods_name'   => $this->string()->notNull(),                     //商品名
            'shop_price'   => $this->integer()->notNull(),                    //商品价格
            'goods_number' => $this->integer()->notNull()->defaultValue(0),   //商品数量
            'goods_desc'   => $this->text()->notNull()->defaultValue(''),     //商品描述
            'goods_img'    => $this->string()->notNull(),                     //商品原图
            'goods_xthumb'  => $this->string()->notNull(),                    //商品缩略小图
            'goods_dthumb'  => $this->string()->notNull(),                    //商品缩略小图
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