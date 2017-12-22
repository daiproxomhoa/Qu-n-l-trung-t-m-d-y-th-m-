<?php

use yii\db\Migration;

class m171213_030534_detail extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%detail}}', [
            'id' => $this->primaryKey(),
            'id_dc' => $this->integer()->unique(),
            'header' => $this->string(),
            'content1' => $this->string(),
            'content2' => $this->string(),
            'content3' => $this->string(),
            'content4' => $this->string(),
            'image_name' => $this->string(),
        ], $tableOptions);
        $this->addForeignKey(
            'fk-dc-detail',
            'detail',
            'id_dc',
            'documment',
            'id',

            'CASCADE'
        );
    }
}
