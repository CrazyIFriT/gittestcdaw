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

    public function indexPageTest(FunctionalTester $I){
        $I->amOnRoute("diccionary");
        $I->see("Diccionaries", "h1");
        $I->click('Create Diccionary');
        $I->see('Create Diccionary','h1');
    }

    public function createTest(FunctionalTester $I){
        $I->amGoingTo('Test Submit Diccionary');
        $I->amOnRoute("diccionary/create");
        $I->fillField('#diccionary-word', 'ads');
        $I->fillField('#diccionary-language', 'EN');
        $I->fillField('#diccionary-translate', 'testeo');
        $I->click('Save');
        $model = Diccionary::findOne(['word'=>'ads']);
        $I->see($model->id,'h1');
        $I->seeResponseCodeIs(200);
    }

    public function updateTest(FunctionalTester $I){
        $model = new Diccionary(['word' => 'pasado', 'language' => 'EN', 'translate' => 'past']);
        $model->save();
        $I->amOnRoute("diccionary/update", ['id' => $model->id]);
        $I->fillField('#diccionary-word', 'present');
        $I->click('Save');
        $I->see($model->id,'h1');
        $test = Diccionary::findOne(['word'=>'present']);
        $I->see($test->word,'td');
    }
    public function updateTestFails(FunctionalTester $I){
        $model = new Diccionary(['word' => 'pasado', 'language' => 'EN', 'translate' => 'past']);
        $model->save();
        $I->amOnRoute("diccionary/update", ['id' => $model->id]);
        $I->fillField('#diccionary-word', 'aaa');
        $I->click('Save');
        $I->dontsee($model->word,'td');
    }
}