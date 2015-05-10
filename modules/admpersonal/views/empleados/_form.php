<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Doctores;
use app\models\Enfermeros;
use app\models\Especialidades;
use yii\helpers\ArrayHelper;
use app\models\Sectores;
$this->registerJsFile('../vendor/bower/jquery/dist/jquery.min.js', array('position' => $this::POS_HEAD), 'jquery');

/* @var $this yii\web\View */
/* @var $model app\models\Empleados */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
    /*function tipoEmpleado(elemento)
    {
        var label = document.getElementById("labelTipoEmpl");
        var input = document.getElementById("inputMatricula");
        if (elemento.value == "doctor")
            {
                label.style.visibility = "visible";
                input.type("text");
                
            }}*/
        
        $(document).ready(function() {
            $("#empleados-tipoempleado").change(
                    function(){
                        var valor = $("#empleados-tipoempleado").val();
                        switch (valor)
                            {
                                case "admin":
                                    $("#empleados-matricula").prop("disabled","disabled");
                                    $("#especialidad").prop("disabled","disabled");
                                    $("#empleados-matricula").prop("disabled","disabled");
                                    break;
                                case "enfermero":
                                    $("#empleados-matricula").prop("disabled","disabled");
                                    $("#especialidad").removeAttr("disabled");
                                    $("#idSector").prop("disabled","disabled");
                                    break;
                                case "doctor":
                                    $("#especialidad").removeAttr("disabled");
                                    $("#empleados-matricula").removeAttr("disabled");
                                    $("#idSector").prop("disabled","disabled");
                                    break;
                                    
                            }
                        
                     
                        }
                    )})
        
        
    
</script>

<div class="empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'DNI')->textInput() ?>
    
    <?php /*= $form->field($model, 'NroEmpleado')->hiddenInput()*/ ?>

    <?= $form->field($model, 'NroEmpleado')->textInput() ?>
    
    <?= $form->field($model, "tipoEmpleado")->dropDownList(["admin"=>"Administrativo", "doctor"=>"Doctor", "enfermero"=>"Enfermero"]) ?>
    
    <div class="form-group field-especialidad">
        <?= Html::label("Sector", "idSector", ["class"=>"control-label"]) ?>
        <?= Html::dropDownList("idSector", null,ArrayHelper::map(Sectores::find()->all(), "idSector", "Descripcion"), ["class"=>"form-control", "id"=>"idSector"]) ?>
    </div>
    
    <?= $form->field($model, "matricula")->textInput(["disabled"=>"disabled"]) ?>
    
    <div class="form-group field-especialidad">
        <?= Html::label("Especialidad", "idEspecialidad", ["class"=>"control-label"]) ?>
        <?= Html::dropDownList("idEspecialidad", null,ArrayHelper::map(Especialidades::find()->all(), "idEspecialidad", "Descripcion"), ["class"=>"form-control", "id"=>"especialidad", "disabled"=>"disabled"]) ?>
    </div>
    
    <?= $form->field($model, 'FechaIngreso')->input("date") ?>

    <?= $form->field($model, 'Email')->input("email", ['maxlength' => 100]) ?>

    <?= $form->field($model, 'Activo')->dropDownList(["1"=>"SI", "0"=>"NO"])//["1"=>"SI", "0"=>"NO"]?>

    <?= $form->field($model, 'FechaBaja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
