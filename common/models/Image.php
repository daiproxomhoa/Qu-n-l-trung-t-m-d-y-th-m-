<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property integer $id_image
 * @property string $image_name
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_image', 'image_name'], 'required'],
            [['id_image'], 'integer'],
            [['image_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_image' => 'Id Image',
            'image_name' => 'Image Name',
        ];
    }
}
