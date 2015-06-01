<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Especialidades;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Doctores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= //$form->field($model, 'idDoctor')->textInput()
        Html::hiddenInput("Doctores[idDoctor]", $model->idDoctor, ['id' =>'doctores-iddoctor']);
    ?>
    
    <div class="form-group field-doctores-idespecialidad required">
        <?= Html::label("Especialidad", "Doctores[idEspecialidad]", ["class"=>"control-label"]) ?>
        <?= Html::dropDownList("Doctores[idEspecialidad]", null, ArrayHelper::map(Especialidades::find()->all(), "idEspecialidad", "Descripcion"), ["class"=>"form-control", "id"=>"doctores-idespecialidad", "name"=>"Doctores[idEspecialidad]"]) ?>
    </div>
    <?php //= $form->field($model, 'idEspecialidad')->textInput() ?>

    <?= $form->field($model, 'Matricula')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
