<?php
//DateTimePicker
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Pacientes;
use app\models\TiposPracticas;
use app\models\Obrassociales;
use app\models\Doctores;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\jui\DatePicker;
//use yii\bootstrap\Modal;
//use kartik\widgets\ActiveForm;
//use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\PracticasMedicas */
/* @var $form yii\widgets\ActiveForm */
?>

<br><div class="practicas-medicas-form"><br>
   
  
   
   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 
         'fieldConfig' => [
         'template' => "{label}\n<span class=\"col-md-3\">"
            . "{input}\n<span class=\"col-md-offset-2 col-md-1\">{error}</span></span>",
        ],
    ]) ?>
    
     <?= $form->field($model, 'idTipoPractica',['template' => '<label class="control-label col-md-1"> Practica: </label> <div  class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(TiposPracticas::find()->all(),'idTipoPractica','Descripcion' ),['prompt'=>('- Seleccione Practica Medica -')])->label('Seleccione Practica Medica:') ?>
     
     <?= $form->field($model, 'idDoctor',['template' => '<label class="control-label col-md-1"> Doctor: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(Doctores::find()->all(),'idDoctor','Nombre','Apellido' ),['prompt'=>('- Seleccione Doctor -')])->label('Seleccione Doctor:') ?>
   
     <?= $form->field($model, 'FechaSolicitud', ['template' => '<label class="control-label col-md-1"> Solicitud: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>',])->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
               
		'autoclose' => true
	]
]);  ?> 
    
     <?= $form->field($model, 'FechaHoraRealizado',['template' => '<label class="control-label col-md-1"> Realizado: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]);  ?>
 
     <?= $form->field($model, 'idPaciente',['template' => '<label class="control-label col-md-1"> Paciente: </label> <div  class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map( Pacientes::find()->all(),'idPaciente','Nombre','Apellido' ),['prompt'=>('- Seleccione Paciente -')])->label('Seleccione Paciente:')?>
 
     <?= $form->field($model, 'idObraSocial',['template' => '<label class="control-label col-md-1"> ObraSocial: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(Obrassociales::find()->all(),'idObraSocial','Descripcion'),['prompt'=>('- Seleccione Obra Social -')])->label('Seleccione Obra Social:') ?>

     <?= $form->field($model, 'Resultado',['template' => '<label class="control-label col-md-1"> Resultado: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textarea(['rows' => 6]) ?>

     <?= $form->field($model, 'file',['template' => '<label class="control-label col-md-1">Adjunto: </label> <div  class="row"><div class="col-sm-6">{input}{error}{hint}</div></div>'])->fileInput() ?>
           
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

      </div>
    
  