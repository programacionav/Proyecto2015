<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RazonSocial')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'CUIT')->textInput(['maxlength' => 13]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cargar Proveedor' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
