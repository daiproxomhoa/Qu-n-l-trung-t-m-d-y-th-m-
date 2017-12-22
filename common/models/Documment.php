<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%documment}}".
 *
 * @property integer $id
 * @property string $document_name
 * @property string $description
 * @property string $link_download
 * @property string $content
 * @property integer $id_user
 * @property string $image_name
 * @property Teacher $idUser
 */
class Documment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%documment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['document_name', 'description', 'content', 'link_download', 'image_name'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_name' => 'Tên thư mục',
            'description' => 'Tiêu đề',
            'content' => 'Nội dung',
            'link_download' => 'Link Download',
            'id_user' => 'Id Teacher',
            'image_name' => 'Image'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'id_user']);
    }
}
