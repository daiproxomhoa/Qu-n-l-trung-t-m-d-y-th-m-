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
 * @property Subject $idMH
 * @property User $idUser
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
            [['id_user', 'id_MH', 'created_at', 'updated_at'], 'required'],
            [['id_user', 'id_MH', 'created_at', 'updated_at'], 'integer'],
            [['id_MH'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['id_MH' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
    public function getIdMH()
    {
        return $this->hasOne(Subject::className(), ['id' => 'id_MH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @inheritdoc
     * @return UserMhQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserMhQuery(get_called_class());
    }
}
