<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadosarticulos */

$this->title = 'Create Estadosarticulos';
$this->params['breadcrumbs'][] = ['label' => 'Estadosarticulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadosarticulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
