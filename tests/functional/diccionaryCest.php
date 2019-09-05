<?php

use app\models\Diccionary;
use app\controllers\DiccionaryController;
use yii\helpers\Url;

class diccionaryCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute("diccionary/index");
        $I->seeResponseCodeIs(200);
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $model = new Diccionary(['word' => 'pasado', 'language' => 'EN', 'translate' => 'past']);
        $model->save();
        $I->amOnRoute("diccionary/view", ['id' => $model->id]);
        $I->seeResponseCodeIs(200);
    }
}