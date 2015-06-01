<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sectores;
use yii\helpers\ArrayHelper

/* @var $this yii\web\View */
/* @var $model app\models\Administrativos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administrativos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEmpleado')->textInput(["disabled"=>"disabled"]) ?>

    <?php //= $form->field($model, 'idSector')->textInput() ?>
    
    <?= $form->field($model, "idSector")->dropDownList(ArrayHelper::map(Sectores::find()->all(), "idSector", "Descripcion")) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
