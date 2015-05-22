<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
echo '<style>
body {background-color:#ddffdd}
</style> ';

/* @var $this yii\web\View */
/* @var $model app\models\Revisionestecnicas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revisionestecnicas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Patente')->DropDownList(ArrayHelper::map(\app\models\Ambulancias::find()->all(), 'Patente', 'Patente', 'Marca')) ?>

    <?= $form->field($model, 'Taller')->textInput(['maxlength' => 50]) ?>

    
    <?= $form->field($model, 'FechaCarga')->widget(
        DatePicker::className(), [
             'inline' => false, 
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
    ])->hint('Fecha de inicio del seguro')->label('Desde');?>
    <?= $form->field($model, 'FechaVigencia')->widget(
        DatePicker::className(), [
             'inline' => false, 
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
    ])->hint('Fecha de vencimiento del seguro')->label('Hasta');?>
    
    

    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6])->hint('Opcional') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar Revision' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
