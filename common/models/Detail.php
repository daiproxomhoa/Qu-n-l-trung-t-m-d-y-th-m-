<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%detail}}".
 *
 * @property integer $id
 * @property string $header
 * @property string $content1
 * @property integer $id_dc
 * @property string $image_name
 * @property string $content2
 * @property string $content3
 * @property string $content4
 * @property string $content5
 *
 * @property Documment $idDc
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'content2', 'content3', 'content4', 'content5'], 'string'],
            [['id_dc'], 'integer'],
            [['content1'], 'required'],
            [['content1', 'image_name'], 'string', 'max' => 255555],
            [['id_dc'], 'exist', 'skipOnError' => true, 'targetClass' => Documment::className(), 'targetAttribute' => ['id_dc' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_dc' => 'Id Dc',
            'header' => 'Tiêu đề',
            'content1' => 'Lời giới thiệu',
            'content2' => 'Khuyến mãi',
            'content3' => 'Mục 1',
            'content4' => 'Mục 2',
            'content5' => 'Mục 3',
            'image_name' => 'Image Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDc()
    {
        return $this->hasOne(Documment::className(), ['id' => 'id_dc']);
    }
}
