<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use app\models\Doctores;
//use app\models\Enfermeros;
use app\models\Especialidades;
use yii\helpers\ArrayHelper;
use app\models\Sectores;
//$this->registerJsFile('vendor/bower/jquery/dist/jquery.min.js', array('position' => $this::POS_HEAD), 'jquery');

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<!-- cdn for modernizr, if you haven't included it already -->

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DNI')->textInput() ?>
    
    <?php /*= $form->field($model, 'NroEmpleado')->hiddenInput()*/ ?>

    <?php //= $form->field($model, 'NroEmpleado')->textInput() ?>
    
    <?php //= $form->field($model, "tipoEmpleado")->dropDownList(["admin"=>"Administrativo", "doctor"=>"Doctor", "enfermero"=>"Enfermero"]) ?>
    
    <?php //= $form->field($model, "idSector")->dropDownList(ArrayHelper::map(Sectores::find()->all(), "idSector", "Descripcion")) ?>
    
    <?php //= $form->field($model, "matricula")->textInput(["disabled"=>"disabled"]) ?>
    
    <?php //= $form->field($model, "idEspecialidad")->dropDownList(ArrayHelper::map(Especialidades::find()->all(), "idEspecialidad", "Descripcion"), ["disabled"=>"disabled"]) ?>
    
    <?= $form->field($model, 'FechaIngreso')->input("date") ?>

    <?= $form->field($model, 'Email')->input("email", ['maxlength' => 100]) ?>

    <?= $form->field($model, 'Activo')->dropDownList(["1"=>"SI", "0"=>"NO"])?>

    <?php //= $form->field($model, 'FechaBaja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
