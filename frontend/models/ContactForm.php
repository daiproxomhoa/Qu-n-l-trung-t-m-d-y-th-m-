<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Contact;


/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $body;
    public $verifyCode;
    public $created_at;
    public $updated_at;

    /**
     * @inheritdoc
     */
    public function rules(){
    $rules = [
        [['name','email','body'],'required'],
        [['name'],'string','max'=>255],
        ['email','string','max'=>100 ],
        ['body','safe'],
        ['email','email'],
        [['created_at','updated_at'],'integer'],
        ['verifyCode', 'captcha']
    ];
    return $rules;
}

    public function contact()
    {
        if (!$this->validate()) {
            return null;
        }
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->body = $this->body;
        $contact->created_at = time();
        $contact->updated_at = time();
        return $contact->save() ? $contact : null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setTextBody($this->body)
            ->send();
    }
}
