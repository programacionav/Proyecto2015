<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LiquidacionMensual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="liquidacion-mensual-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Mes')->textInput() ?>

    <?= $form->field($model, 'Anio')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'idEmpleado')->textInput() ?>

    <?= $form->field($model, 'Pagada')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
