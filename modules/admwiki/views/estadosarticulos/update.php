<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadosarticulos */

$this->title = 'Update Estadosarticulos: ' . ' ' . $model->idestado;
$this->params['breadcrumbs'][] = ['label' => 'Estadosarticulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestado, 'url' => ['view', 'id' => $model->idestado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadosarticulos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
