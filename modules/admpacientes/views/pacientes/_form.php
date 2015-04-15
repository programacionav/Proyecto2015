<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DNI')->textInput() ?>

    <?= $form->field($model, 'idLocalidad')->textInput() ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'FechaNac')->textInput() ?>

    <?= $form->field($model, 'FechaAlta')->textInput() ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
