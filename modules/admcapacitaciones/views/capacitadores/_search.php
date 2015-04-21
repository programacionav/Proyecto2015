<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admcapacitaciones\models\CapacitadoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitadores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCapacitador') ?>

    <?= $form->field($model, 'idEmpresaCapacitadora') ?>

    <?= $form->field($model, 'Apellido') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'idEspecialidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
