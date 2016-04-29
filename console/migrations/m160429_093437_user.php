<?php

use yii\db\Schema;
use yii\db\Migration;

class m160429_093437_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%test_user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            /* create by wodrow */
            'is_admin' => $this->integer(1)->defaultValue(0)->notNull(),
            'email_validate_code' => $this->string(32)->defaultValue('')->notNull(),
            /* create by wodrow */
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%test_user}}');
    }
}
