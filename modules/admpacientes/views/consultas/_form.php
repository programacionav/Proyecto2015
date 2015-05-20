<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Doctores;
use app\models\Pacientes;
use app\models\Obrassociales;
/* @var $this yii\web\View */
/* @var $model app\models\Consultas */
/* @var $form yii\widgets\ActiveForm */
?>

<br><div class="consultas-form"><br>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FechaHora',['template' => '<label class="control-label col-md-1"> Fecha/Hora: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>',])->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]); ?>

    <?= $form->field($model, 'idDoctor',['template' => '<label class="control-label col-md-1"> Doctor </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(Doctores::find()->all(),'idDoctor','Nombre','Apellido' ),['prompt'=>('- Seleccione Doctor -')])?>

    <?= $form->field($model, 'idPaciente',['template' => '<label class="control-label col-md-1"> Paciente: </label> <div  class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map( Pacientes::find()->all(),'idPaciente','Nombre','Apellido' ),['prompt'=>('- Seleccione Paciente -')])?>

    <?= $form->field($model, 'Diagnostico',['template' => '<label class="control-label col-md-1"> Diagnostico: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Tratamiento',['template' => '<label class="control-label col-md-1"> Tratamiento: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idObraSocial',['template' => '<label class="control-label col-md-1"> ObraSocial: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(Obrassociales::find()->all(),'idObraSocial','Descripcion' )) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
