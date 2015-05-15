<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservas */

$this->title = 'Modificar Reserva '.$model->idReserva;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReserva, 'url' => ['view', 'id' => $model->idReserva]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="reservas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
