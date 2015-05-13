<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admfarmacia\PedidoCompraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-compra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'idProveedor')->dropDownList(ArrayHelper::map(app\models\Proveedor::find()->all(),'idProveedor','RazonSocial'),['prompt'=>('---Elija un proveedor---')])->label('Seleccione un proveedor:') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
