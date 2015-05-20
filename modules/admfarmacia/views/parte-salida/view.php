<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ParteSalida */

$tit = 'Numero de Pedido: ';
$this->title = $tit.$model->idParte;
$this->params['breadcrumbs'][] = ['label' => 'Parte Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parte-salida-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ACTUALIZAR', ['update', 'id' => $model->idParte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->idParte], [
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
            'idParte',
            'Fecha',
            'idEmpleado',
        ],
    ]) ?>

</div>
