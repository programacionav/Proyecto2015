<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Empleados',
]) . ' ' . $model->idEmpleado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado, 'url' => ['view', 'id' => $model->idEmpleado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
