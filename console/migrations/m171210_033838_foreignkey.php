<?php

use yii\db\Migration;

class m171210_033838_foreignkey extends Migration
{
    public function up()
    {
        $this->addForeignKey(
            'fk-user-UM',
            'user_MH',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-UM-subject',
            'user_MH',
            'id_MH',
            'subject',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-subject_teacher',
            'subject',
            'teacher_id',
            'teacher',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'documment',
            'documment',
            'id_user',
            'teacher',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
//        $this->dropTable('foreign_key');
    }

}
