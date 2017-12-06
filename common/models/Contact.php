<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**e
 * Contact modl
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property integer $created_at
 * @property integer $updated_at
 *  */

/**
 *
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 30/11/2017
 * Time: 10:20 CH
 */
class Contact extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%contact}}';
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
