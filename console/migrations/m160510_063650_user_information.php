<?php

use yii\db\Migration;

class m160510_063650_user_information extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%user_information}}', [
            'user_id' => $this->integer(),
            'avatar' => $this->string(),
            'nickname' => $this->string(16),
            'sex' => $this->smallInteger(),
            'birthday' => $this->integer(),
            'main_page' => $this->string(), //个人主页
            'telephone' => $this->string(13), //电话
            'mobilephone' => $this->string(11), //手机
            'qq' => $this->string(),
            'country' => $this->string(), //国家
            'area_id' => $this->integer(), //地区
            'address' => $this->string(), //地址
            'company' => $this->string(),
            'personalized_signature' => $this->string(), // 个性签名
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'PRIMARY KEY (user_id)',
            'CONSTRAINT user_information_user_id_has_many_user_id FOREIGN KEY (user_id) REFERENCES {{%user}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user_information}}');
    }
}
