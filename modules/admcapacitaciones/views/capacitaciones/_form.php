<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCapacitacion')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'DuracionHoras')->textInput() ?>

    <?= $form->field($model, 'idCapacitador')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
