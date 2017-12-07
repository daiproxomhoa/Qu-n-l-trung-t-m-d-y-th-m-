<?php

use yii\db\Migration;

class m171205_030435_user_MH extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_MH}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull()->unique(),
            'id_MH' => $this->integer()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->addForeignKey(
            'fk-user-UM',
            'user_MH',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }
}

