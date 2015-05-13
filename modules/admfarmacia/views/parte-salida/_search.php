<?php

/****** ACA HAY QUE CONSEGUIR LA LISTA DE EMPLEADOS!! ******/


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admfarmacia\ParteSalidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parte-salida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idParte') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'idEmpleado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
