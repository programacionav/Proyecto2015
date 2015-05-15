<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reservas */

$this->title = 'Reserva '.$model->idReserva;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idReserva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idReserva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idReserva',
            'Fecha',
            'idMenu',
            'idEmpleado',
            'Retiro',
            'Observaciones:ntext',
        ],
    ]) ?>
    
    <?= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>

</div>
