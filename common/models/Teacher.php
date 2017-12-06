<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property integer $id
 * @property string $name_teacher
 * @property string $specialized
 * @property string $degree
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Subject[] $subjects
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_teacher', 'specialized', 'degree', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name_teacher', 'specialized', 'degree'], 'string', 'max' => 255],
            [['name_teacher'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_teacher' => Yii::t('app', 'Name Teacher'),
            'specialized' => Yii::t('app', 'Specialized'),
            'degree' => Yii::t('app', 'Degree'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['teacher_id' => 'id']);
    }
}
