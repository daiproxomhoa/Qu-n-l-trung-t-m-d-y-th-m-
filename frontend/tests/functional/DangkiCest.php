<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class DangkiCest
{
    public function checkDangki(FunctionalTester $I)
    {
        $I->amOnPage(['dangki/index']);
        $I->see('Đăng kí học trực tuyến');
    }

}