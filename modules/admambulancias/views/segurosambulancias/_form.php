<?php
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Segurosambulancias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="segurosambulancias-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'Patente')->DropDownList(ArrayHelper::map(\app\models\Ambulancias::find()->all(), 'Patente', 'Patente', 'Marca')) ?>

    

    <?= $form->field($model, 'NroPoliza')->textInput(['maxlength' => 20])->label('N&uacute;mero de Poliza') ?>

    <?= $form->field($model, 'Aseguradora')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model, 'FechaDesde')->widget(
        DatePicker::className(), [
             'inline' => false, 
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
    ])->hint('Fecha de inicio de la p&oacute;liza')->label('Desde');?>
    <?= $form->field($model, 'FechaHasta')->widget(
        DatePicker::className(), [
             'inline' => false, 
            'language' => 'es',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy'
            ]
    ])->hint('Fecha de vencimiento de la p&oacute;liza')->label('Hasta');?>

    <?= $form->field($model, 'ValorMensual')->textInput(['maxlength' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
