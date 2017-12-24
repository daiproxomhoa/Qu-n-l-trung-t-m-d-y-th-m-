<?php

namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'daica',
            'email' => 'some_email@example.com',
            'password' => 'dsadsa',
            'born' => '1996-01-01',
            'phone' => '123',
            'address' => '123',
        ]);

        $user = $model->signup();
        expect($user)->isInstanceOf('common\models\User');
        expect($user->username)->equals('daica');
        expect($user->email)->equals('some_email@example.com');
        expect($user->validatePassword('dsadsa'))->true();
    }

    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'troy.becker',
            'email' => 'nicolas.dianna@hotmail.com',
            'password' => 'some_password',
            'born' => '1996-01-01',
            'phone' => '123',
            'address' => '123',
        ]);

        expect_not($model->signup());
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));

        expect($model->getFirstError('username'))
            ->equals('This username has already been taken.');
        expect($model->getFirstError('email'))
            ->equals('This email address has already been taken.');
    }
}
