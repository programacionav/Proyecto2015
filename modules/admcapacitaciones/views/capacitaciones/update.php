<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitaciones */

$this->title = 'Update Capacitaciones: ' . ' ' . $model->idCapacitacion;
$this->params['breadcrumbs'][] = ['label' => 'Capacitaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCapacitacion, 'url' => ['view', 'id' => $model->idCapacitacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capacitaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
