<?php
/**
 * Created by PhpStorm.
 * User: Vu Tien Dai
 * Date: 24/12/2017
 * Time: 9:22 CH
 */

namespace frontend\tests\unit\models;

use common\fixtures\DangkiFixture;
use common\models\dangki;

class DangkiFormCest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => DangkiFixture::className(),
                'dataFile' => codecept_data_dir() . 'dangki.php'
            ]
        ]);
    }
    public function testCorrectDangki()
    {
        $model = new dangki([
            'id_user' => '1',
            'id_MH' => '1',
            'created_at' => '123',
            'updated_at' => '123',
        ]);
        $user= $model->save();

//        expect($user)->isInstanceOf('common\models\dangki');
//        expect($user->id_user)->equals('1');
//        expect($user->id_MH)->equals('1');

    }
}
