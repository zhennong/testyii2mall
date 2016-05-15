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
            'avatar' => $this->string()->notNull()->defaultValue(''),
            'nickname' => $this->string(16)->notNull()->defaultValue(''),
            'sex' => $this->smallInteger()->notNull()->defaultValue(0),//男为1,女为2
            'birthday' => $this->integer()->notNull()->defaultValue(0),
            'main_page' => $this->string()->notNull()->defaultValue(''), //个人主页
            'telephone' => $this->string(13)->notNull()->defaultValue(''), //电话
            'mobilephone' => $this->string(11)->notNull()->defaultValue(''), //手机
            'qq' => $this->string()->notNull()->defaultValue(''),
            'country' => $this->string()->notNull()->defaultValue(''), //国家
            'area_id' => $this->integer()->notNull()->defaultValue(0), //地区
            'address' => $this->string()->notNull()->defaultValue(''), //地址
            'company' => $this->string()->notNull()->defaultValue(''),
            'personalized_signature' => $this->string()->notNull()->defaultValue(''), // 个性签名
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
            'PRIMARY KEY (user_id)',
            //创建外键
            'CONSTRAINT user_information_user_id_has_many_user_id FOREIGN KEY (user_id) REFERENCES {{%user}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%user_information}}');
    }
}
