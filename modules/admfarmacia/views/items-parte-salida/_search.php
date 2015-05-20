<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admfarmacia\ItemsParteSalidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-parte-salida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idItem') ?>

    <?= $form->field($model, 'idParte') ?>

    <?= $form->field($model, 'idInsumo')->dropDownList(ArrayHelper::map(app\models\Insumos::find()->all(),'idInsumo','Descripcion'),['prompt'=>('- Elija un Insumo -')])->label('Seleccione un Insumo:') ?>
	
    <?= $form->field($model, 'Cantidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
