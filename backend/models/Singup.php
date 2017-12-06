<?php 
namespace backend\models;
use yii\db\ActiveRecord;
class Signup extends ActiveRecord {
	public static function tablename(){
		return 'user';
	}
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['phone','required'],
            ['phone','integer'],
            ['born','required'],
            ['born','integer'],
            ['address','required'],
            ['address','string','max'=>255],
            ['address','unique']

        ];
    }


}
 ?>

