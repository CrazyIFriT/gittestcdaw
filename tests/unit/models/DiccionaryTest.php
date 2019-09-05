<?php

namespace tests\unit\models;

use app\models\Diccionary;

class DiccionaryTest extends \Codeception\Test\Unit
{
    private $model;
    /**
     * @var \UnitTester
     */
    public $tester;

    public function testInsertItems()
    {
        $model = new Diccionary(['word' => 'Hola', 'language' => 'EN', 'translate' => 'hello']);
        $model->save();
        expect(Diccionary::translate("hola","EN"))->equals("hello");
    }

    /* public function testInsertnull(){
        $model = new Diccionary();
        //$model->save();
        //var_dump($model->errors);
        expect($model->save())->equals(false);
        //expect($model->errors)
    } */
}
//vendor\bin\codecept run unit tests\unit\models\DiccionaryTest.php