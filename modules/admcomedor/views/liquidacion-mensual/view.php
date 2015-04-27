<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LiquidacionMensual */

$this->title = $model->idliquidacion;
$this->params['breadcrumbs'][] = ['label' => 'Liquidacion Mensual', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liquidacion-mensual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idliquidacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idliquidacion], [
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
            'idliquidacion',
            'Mes',
            'Anio',
            'Total',
            'idEmpleado',
            'Pagada',
        ],
    ]) ?>

</div>
