<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpacientes\PacientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPaciente') ?>

    <?= $form->field($model, 'Apellido') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'DNI') ?>

    <?= $form->field($model, 'idLocalidad') ?>

    <?php // echo $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'FechaNac') ?>

    <?php // echo $form->field($model, 'FechaAlta') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
