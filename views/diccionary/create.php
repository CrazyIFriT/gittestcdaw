<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diccionary */

$this->title = 'Create Diccionary';
$this->params['breadcrumbs'][] = ['label' => 'Diccionaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diccionary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
