<?php

use yii\db\Migration;

class m171205_094014_teacher extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%teacher}}', [
            'id' => $this->primaryKey(),
            'name_teacher' => $this->string()->notNull()->unique(),
            'specialized' => $this->string()->notNull(),
            'degree' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

    }
}

