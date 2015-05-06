<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpacientes\ConsultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idConsulta') ?>

    <?= $form->field($model, 'FechaHora') ?>

    <?= $form->field($model, 'idDoctor') ?>

    <?= $form->field($model, 'idPaciente') ?>

    <?= $form->field($model, 'Diagnostico') ?>

    <?php // echo $form->field($model, 'Tratamiento') ?>

    <?php // echo $form->field($model, 'idObraSocial') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
