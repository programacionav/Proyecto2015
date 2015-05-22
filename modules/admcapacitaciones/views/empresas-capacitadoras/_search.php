<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admcapacitaciones\models\EmpresasCapacitadorasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-capacitadoras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEmpresa') ?>

    <?= $form->field($model, 'Cuit') ?>

    <?= $form->field($model, 'RazonSocial') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?= $form->field($model, 'Telefono') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetear', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
