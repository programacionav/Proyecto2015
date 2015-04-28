<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpersonal\models\EmpleadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEmpleado') ?>

    <?= $form->field($model, 'Apellido') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'DNI') ?>

    <?= $form->field($model, 'NroEmpleado') ?>

    <?php // echo $form->field($model, 'FechaIngreso') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'FechaBaja') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
