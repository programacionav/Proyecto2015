<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CapacitacionesDoctores */

$this->title = 'Update Capacitaciones Doctores: ' . ' ' . $model->idCD;
$this->params['breadcrumbs'][] = ['label' => 'Capacitaciones Doctores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCD, 'url' => ['view', 'id' => $model->idCD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capacitaciones-doctores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
