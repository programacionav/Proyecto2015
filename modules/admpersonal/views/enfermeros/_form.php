<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Especialidades;

/* @var $this yii\web\View */
/* @var $model app\models\Enfermeros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enfermeros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'idEnfermero')->textInput(["disabled"=>"disabled"]) ?>

    <?= $form->field($model, 'idEspecialidad')->dropDownList(ArrayHelper::map(Especialidades::find()->all(), "idEspecialidad", "Descripcion")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
