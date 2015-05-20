<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */

$this->title = $model->Apellido." ".$model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enfermeros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermeros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEnfermero',
            "Apellido",
            "Nombre",
            "DNI",
            "NroEmpleado",
            "FechaIngreso",
            "Email",
            "Activo",
            "FechaBaja",
            "espDescripcion",
            //'idEspecialidad',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Editar'), ['update', 'id' => $model->idEnfermero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'id' => $model->idEnfermero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
