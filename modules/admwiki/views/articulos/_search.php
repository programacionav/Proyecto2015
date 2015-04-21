<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admwiki\models\ArticulosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idArticulo') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Texto') ?>

    <?= $form->field($model, 'FechaAlta') ?>

    <?php // echo $form->field($model, 'idEstado') ?>

    <?php // echo $form->field($model, 'idEmpleado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
