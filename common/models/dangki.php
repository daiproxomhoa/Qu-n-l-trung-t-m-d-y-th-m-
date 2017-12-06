<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_mh}}".
 *
 * @property integer $id_user
 * @property integer $id_MH
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Subject $subject
 * @property User $user
 */
class dangki extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_mh}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_MH', 'created_at', 'updated_at'], 'required'],
            [['id_MH', 'created_at', 'updated_at'], 'integer'],
            [['id_MH'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'id_MH' => 'Id  Mh',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'id_MH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
