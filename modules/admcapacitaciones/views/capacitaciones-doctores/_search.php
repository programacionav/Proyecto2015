<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admcapacitaciones\models\CapacitacionesDoctoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-doctores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCD') ?>

    <?= $form->field($model, 'idDoctor') ?>

    <?= $form->field($model, 'idCapacitacion') ?>

    <?= $form->field($model, 'Resultado') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetear', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
