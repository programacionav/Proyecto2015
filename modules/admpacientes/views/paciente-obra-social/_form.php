<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteObraSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-obra-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPaciente')->textInput() ?>

    <?= $form->field($model, 'idObraSocial')->textInput() ?>

    <?= $form->field($model, 'NroAfiliado')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
