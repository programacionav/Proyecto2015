<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CapacitacionesDoctores */

$this->title = $model->idCD;
$this->params['breadcrumbs'][] = ['label' => 'Capacitaciones Doctores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-doctores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idCD], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCD',
            'idDoctor',
            'idCapacitacion',
            'Resultado',
        ],
    ]) ?>

</div>
