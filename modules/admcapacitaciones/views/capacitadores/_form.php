<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitadores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitadores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCapacitador')->textInput() ?>

    <?= $form->field($model, 'idEmpresaCapacitadora')->textInput() ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'idEspecialidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
