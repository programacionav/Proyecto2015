<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Doctores;
use app\models\Enfermeros;

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
    function tipoEmpleado(elemento)
    {
        var label = document.getElementById("labelTipoEmpl");
        var input = document.getElementById("inputMatricula");
        if (elemento.value == "doctor")
            {
                label.style.visibility = "visible";
                input.type("text");
                
            }
        
    }
</script>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DNI')->textInput() ?>
    
    <?php /*= $form->field($model, 'NroEmpleado')->hiddenInput()*/ ?>

    <?= $form->field($model, 'NroEmpleado')->textInput() ?>
    
    <div class="form-group field-tipo">
        <?= Html::label("Tipo", "tipo", ["class"=>"control-label", "id"=>"labelTipoEmpl"]) ?>
        <?= Html::dropDownList("tipo", "enfermero", ["doctor"=>"Doctor", "enfermero"=>"Enfermero"], ["class"=>"form-control", "onChange"=>"tipoEmpleado(this)", "id"=>"tipoEmpleado"]) ?>
    </div>
    
    <div class="form-group field-matricula">
        <?= Html::label("Matricula", "matricula",["style"=>"visibility: hidden;", "class"=>"control-label"]) ?>
        <?= Html::input("hidden", "matricula", "", ["class"=>"form-control", "id"=>"inputMatricula"])?>
    </div>
    
    <?= $form->field($model, 'FechaIngreso')->input("date") ?>

    <?= $form->field($model, 'Email')->input("email", ['maxlength' => 100]) ?>

    <?= $form->field($model, 'Activo')->dropDownList(["1"=>"SI", "0"=>"NO"])//["1"=>"SI", "0"=>"NO"]?>

    <?= $form->field($model, 'FechaBaja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
