<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Capacitadores;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Capacitaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCapacitacion')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => 250]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <h4>Fecha</h4>
    <?=
    	DatePicker::widget([
		    'model' => $model,
		    'attribute' => 'Fecha',
		    'template' => '{addon}{input}',
		    'clientOptions' => [
		    'autoclose' => true,
		    'format' => 'yyyy-mm-dd'
	        ]
		]);
    ?>

    <?= $form->field($model, 'DuracionHoras')->textInput() ?>
	<?= $form->field($model, 'idCapacitador')->widget(Select2::classname(), [
		    'data' => ArrayHelper::map(Capacitadores::find()->all(), 'idCapacitador', 'Apellido'),
		    'language' => 'de',
		    'options' => ['placeholder' => 'Buscar un capacitador ...'],
		    'pluginOptions' => [
		    'allowClear' => true
		    ],
			]);
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
