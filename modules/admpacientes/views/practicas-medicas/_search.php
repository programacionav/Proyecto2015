<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpacientes\PracticasMedicasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="practicas-medicas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPractica') ?>

    <?= $form->field($model, 'idTipoPractica') ?>

    <?= $form->field($model, 'FechaSolicitud') ?>

    <?= $form->field($model, 'FechaHoraRealizado') ?>

    <?= $form->field($model, 'idDoctor') ?>

    <?php // echo $form->field($model, 'idPaciente') ?>

    <?php // echo $form->field($model, 'Resultado') ?>

    <?php // echo $form->field($model, 'idObraSocial') ?>

    <?php // echo $form->field($model, 'Adjunto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
