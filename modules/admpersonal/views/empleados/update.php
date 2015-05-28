<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = "Modificar datos";/*$model->Nombre." ".$model->Apellido; /*Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Empleados',
]) . ' ' . $model->idEmpleado;*/
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado, 'url' => ['view', 'id' => $model->idEmpleado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'update');
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formu', [
        'model' => $model,
    ]) ?>

</div>
