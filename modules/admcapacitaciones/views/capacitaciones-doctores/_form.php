<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CapacitacionesDoctores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-doctores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCD')->textInput() ?>

    <?= $form->field($model, 'idDoctor')->textInput() ?>

    <?= $form->field($model, 'idCapacitacion')->textInput() ?>

    <?= $form->field($model, 'Resultado')->textInput(['maxlength' => 500]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
