<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Insumos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insumos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NroSerie')->textInput() ?>

    <?= $form->field($model, 'idProveedor')->dropDownList(ArrayHelper::map(app\models\Proveedor::find()->all(),'idProveedor','RazonSocial'),['prompt'=>('- Elija un proveedor -')])->label('Seleccione un Proveedor:') ?>

    <?= $form->field($model, 'FechaVencimiento')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Precio')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
