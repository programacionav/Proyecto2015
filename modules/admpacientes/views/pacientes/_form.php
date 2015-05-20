<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacientes-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 
         'fieldConfig' => [
         'template' => "{label}\n<span class=\"col-md-3\">"
            . "{input}\n<span class=\"col-md-offset-2 col-md-1\">{error}</span></span>",
        ],
    ]); ?>

    <?= $form->field($model, 'Apellido',['template' => '<label class="control-label col-md-1"> Apellido: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre',['template' => '<label class="control-label col-md-1"> Nombre: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DNI',['template' => '<label class="control-label col-md-1"> DNI: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput() ?>

    <?= $form->field($model, 'idLocalidad',['template' => '<label class="control-label col-md-1"> Localidad: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->dropDownList(ArrayHelper::map(\app\models\Localidades::find()->all(),'idLocalidad','Descripcion'),['prompt'=>('- Seleccione Localidad -')])->label('Seleccione Localidad:') ?>

    <?= $form->field($model, 'Direccion',['template' => '<label class="control-label col-md-1"> Dirección: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'FechaNac',['template' => '<label class="control-label col-md-1"> Fecha de Nacimiento: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])-> widget(\yii\jui\DatePicker::className(),[
        
        'dateFormat'=> 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'FechaAlta',['template' => '<label class="control-label col-md-1"> Fecha de Alta: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])-> widget(\yii\jui\DatePicker::className(),[
        
        'dateFormat'=> 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'Email',['template' => '<label class="control-label col-md-1"> Email: </label> <div class="row"><div class="col-sm-4">{input}{error}{hint}</div></div>'])->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
