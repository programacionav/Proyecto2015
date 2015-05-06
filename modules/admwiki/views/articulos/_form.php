<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FechaAlta')->textInput() ?>

    <?= $form->field($model, 'idEstado')->textInput() ?>

    <?= $form->field($model, 'idEmpleado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
