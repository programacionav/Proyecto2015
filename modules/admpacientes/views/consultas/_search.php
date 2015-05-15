<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admpacientes\ConsultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<br><h1>Consultas</h1><br>
<div class="consultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['ficha','id'=>$id],
        'method' => 'get',
        'options'=>['class'=>'form-horizontal'],
        'fieldConfig' => [
          'template'=>"{label}\n<div class=\"col-md-2\">"
            . "{input}\n<div class=\"col-md-offset-2 col-md-2\">{error}</div>",
        ],
    ]); ?>

    <?php // $form->field($model, 'idConsulta') ?>

    <?php //$form->field($model, 'FechaHora') ?>

    <?= $form->field($searchModel2, 'fechaIni',['labelOptions'=>['class'=>'control-label col-md-1']]) -> widget(\yii\jui\DatePicker::className(),[
        
        'dateFormat'=> 'yyyy-MM-dd',
    ])?>
    
    <?= $form->field($searchModel2, 'fechaFin',['labelOptions'=>['class'=>'control-label col-md-1']]) -> widget(\yii\jui\DatePicker::className(),[
        
        'dateFormat'=> 'yyyy-MM-dd',
    ]) ?>
    
    <?php //$form->field($model, 'idDoctor') ?>

    <?php //$form->field($model, 'idPaciente') ?>

    <?php //$form->field($model, 'Diagnostico') ?>

    <?php // echo $form->field($model, 'Tratamiento') ?>

    <?php // echo $form->field($model, 'idObraSocial') ?>

    <div class="form-group">
         <?= Html::submitButton(Yii::t('app', 'Filtrar'), ['class' => 'btn btn-primary']) ?>
        <?php //Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
