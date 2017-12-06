<?php

use yii\db\Migration;

class m170726_031830_add_foriegn_key extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_user_subject','subject','id','user','maMH');
        $this->addForeignKey('fk_subject_teacher', 'teacher', 'id', 'subject', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
//        $this->dropTable('foreign_key');
    }
}
