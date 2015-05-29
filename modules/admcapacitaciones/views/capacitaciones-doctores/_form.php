<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Capacitaciones;
use app\models\Doctores;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\CapacitacionesDoctores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="capacitaciones-doctores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCD')->textInput() ?>
    
    <?= $form->field($model, 'idDoctor')->widget(Select2::classname(), [
		    'data' => ArrayHelper::map(Doctores::find()->all(), 'idDoctor', 'Apellido'),
		    'language' => 'de',
		    'options' => ['placeholder' => 'Buscar un doctor ...'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
			]);
	?>
    
    <?= $form->field($model, 'idCapacitacion')->dropDownList(ArrayHelper::map(Capacitaciones::find()->all(), 'idCapacitacion', 'Nombre'), ['prompt'=>'Seleccionar Capacitacion']) ?>

    <?= $form->field($model, 'Resultado')->textInput(['maxlength' => 500]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
