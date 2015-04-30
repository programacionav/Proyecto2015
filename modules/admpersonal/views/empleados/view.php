<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Doctores;
use app\models\Enfermeros;

$Doctores = new Doctores();
$Enfermeros = new Enfermeros();

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = $model->idEmpleado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idEmpleado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idEmpleado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => array($model, $Enfermeros, $Doctores),
        'attributes' => [
            'idEmpleado',
            'Apellido',
            'Nombre',
            'DNI',
            'NroEmpleado',
            'FechaIngreso',
            'Email:email',
            'Activo',
            'FechaBaja',
            'Matricula'
        ],
    ]) ?>

</div>
