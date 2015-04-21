<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitadores */

$this->title = $model->idCapacitador;
$this->params['breadcrumbs'][] = ['label' => 'Capacitadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitadores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idCapacitador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idCapacitador], [
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
            'idCapacitador',
            'idEmpresaCapacitadora',
            'Apellido',
            'Nombre',
            'idEspecialidad',
        ],
    ]) ?>

</div>
