<?php

use yii\db\Migration;

class m171205_093031_subject extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey(),
            'subject_name' => $this->string()->notNull()->unique(),
            'teacher_id' => $this->integer()->notNull(),
            'schedule' => $this->string()->notNull(),
            'time_start' => $this->date()->notNull(),
            'time_study' => $this->integer()->notNull(),
            'money' => $this->integer(),
            'dangki' => $this->integer(),
            'amount' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


    }
}
