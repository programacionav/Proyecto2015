<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoCompra */
/* @var $form yii\widgets\ActiveForm */


/* @var $this yii\web\View */
/* @var $model app\models\PedidoCompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'idProveedor')->dropDownList(ArrayHelper::map(app\models\Proveedor::find()->all(),'idProveedor','RazonSocial'),['prompt'=>('- Elija un proveedor -')])->label('Seleccione un proveedor:') ?>



    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
