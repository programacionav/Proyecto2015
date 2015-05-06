<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpersonal\models\LicenciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="licencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLicencia') ?>

    <?= $form->field($model, 'idTipoLicencia') ?>

    <?= $form->field($model, 'idEmpleado') ?>

    <?= $form->field($model, 'FechaInicio') ?>

    <?= $form->field($model, 'FechaFin') ?>

    <?php // echo $form->field($model, 'idEstado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
