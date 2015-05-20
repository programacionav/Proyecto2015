<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParteSalida */

$this->title = 'Update Parte Salida: ' . ' ' . $model->idParte;
$this->params['breadcrumbs'][] = ['label' => 'Parte Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idParte, 'url' => ['view', 'id' => $model->idParte]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parte-salida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
