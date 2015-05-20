<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Empleados;

echo '<style>
body {background-color:#dddddd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Ambulancias */
/* @var $form yii\widgets\ActiveForm */
//<?=  $form->field($model, 'idEmpleado')->DropDownList(ArrayHelper::map(\app\models\Empleados::find()->all(), 'idEmpleado', 'Nombre', 'Apellido'))->hint('Seleccione el empleado a cargo')->label('Empleado') ? >
?>

<div class="ambulancias-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'Patente')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'Marca')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'NroMotor')->textInput()->label('N&uacute;mero de Motor') ?>

    <?=
    $form->field($model, 'idEmpleado')->label('Empleado')->hint('Seleccione el empleado a cargo')->widget(Select2::classname(), [
        'data' => $arreDatos,
        'language' => 'en',
        'options' => ['placeholder' => 'Seleccione la busqueda ...'],
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

