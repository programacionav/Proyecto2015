<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admpacientes\ConsultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['ficha','id'=>$id],
        'method' => 'get',
        
    ]); ?>

    <?php // $form->field($model, 'idConsulta') ?>

    <?php //$form->field($model, 'FechaHora') ?>

    <?= $form->field($searchModel2, 'fechaIni') ?>
    
    <?= $form->field($searchModel2, 'fechaFin') ?>
    
    <?php //$form->field($model, 'idDoctor') ?>

    <?php //$form->field($model, 'idPaciente') ?>

    <?php //$form->field($model, 'Diagnostico') ?>

    <?php // echo $form->field($model, 'Tratamiento') ?>

    <?php // echo $form->field($model, 'idObraSocial') ?>

    <div class="form-group">
         <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
