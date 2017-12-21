<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subject}}".
 *
 * @property integer $id
 * @property string $subject_name
 * @property integer $teacher_id
 * @property string $schedule
 * @property integer $time_start
 * @property integer $time_study
 * @property integer $money
 * @property integer $dangki
 * @property integer $amount
 * @property integer $created_at
 * @property integer $updated_at
 * @property Teacher $teacher
 * @property User[] $users
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subject}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_name', 'teacher_id', 'schedule', 'time_start', 'time_study', 'money', 'amount','dangki', 'created_at', 'updated_at'], 'required'],
            [['teacher_id', 'time_study', 'created_at', 'updated_at'], 'integer'],
            [['subject_name', 'schedule'], 'string', 'max' => 255],
            [['subject_name'], 'unique'],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_name' => Yii::t('app', 'Tên môn học'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'schedule' => Yii::t('app', 'Lịch học'),
            'time_start' => Yii::t('app', 'Bắt đầu '),
            'time_study' => Yii::t('app', 'Thời gian học'),
            'money' => Yii::t('app', 'Học phí'),
            'dangki' => Yii::t('app', 'Số lượng học viên đăng kí '),
            'amount' => Yii::t('app', 'Số lượng sv một lớp'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['maMH' => 'id']);
    }
}
