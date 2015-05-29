<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\admcapacitaciones\models\CapacitacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //echo $form->field($model, 'idCapacitacion') ?>

    <?php //echo $form->field($model, 'Nombre') ?>

    <?php //echo $form->field($model, 'Descripcion') ?>

    <?php //echo $form->field($model, 'Desde') ?>
    <?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'Desde',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
	]);?>
 	<br />
 	<?php //echo $form->field($model, 'Hasta') ?>
 	<?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'Hasta',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
	]);?>
	<br />
    <?php //echo $form->field($model, 'DuracionHoras') ?>

    <?php // echo $form->field($model, 'idCapacitador') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Resetear', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
