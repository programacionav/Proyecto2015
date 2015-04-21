<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasCapacitadoras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-capacitadoras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Cuit')->textInput(['maxlength' => 15]) ?>

    <?= $form->field($model, 'RazonSocial')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
