<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admfarmacia\InsumosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="insumos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInsumo') ?>

    <?= $form->field($model, 'NroSerie') ?>

    <?= $form->field($model, 'idProveedor')->dropDownList(ArrayHelper::map(app\models\Proveedor::find()->all(),'idProveedor','RazonSocial'),['prompt'=>('- Elija un proveedor -')])->label('Seleccione un proveedor:') ?>
    
    <?= $form->field($model, 'FechaVencimiento') ?>

    <?= $form->field($model, 'Descripcion')->textArea(['rows' => 6])  ?>

    <?php echo $form->field($model, 'Precio') ?>

    <?php echo $form->field($model, 'Stock') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Borrar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
