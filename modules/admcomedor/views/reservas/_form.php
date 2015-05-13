<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Menus;
use app\models\LiquidacionMensual;
use app\models\Empleados;
use yii\helpers\ArrayHelper;
use app\modules\admcomedor\controllers\MenusController;


/* @var $this yii\web\View */
/* @var $model app\models\Reservas */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">

/*	$(document).ready(function() {
		$("#reservas-fecha").change(function(){
        	var fecha = $("#reservas-fecha").val();
        	
           
        })
    })*/

</script>

<?php 
//Busco el menu del dia y lo guardo en una variable.
$menu = Menus::findOne(['Fecha'=>date('Y-m-d')]);

//Busco los registros de todos los empleados.
$listaEmpleados = Empleados::find()->all();
$arrayEmpleados = [];
foreach ($listaEmpleados as $empleado) {
	$idEmp = $empleado->idEmpleado;
	$emp = $empleado->Nombre.' '.$empleado->Apellido.' - '.$empleado->DNI;
	
	//Armo un array con cada empleado y lo sumo al array general.
	$miniArray = [$idEmp, $emp]	;
	array_push($arrayEmpleados, $miniArray);
}
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->textInput(['value'=>date('Y-m-d')]) ?>
    
    <?= $form->field($model, 'idMenu')->hiddenInput(['value'=>$menu->idMenu])->hint($menu->Descripcion.' - $'.$menu->Precio) ?>
    
    <?= $form->field($model, 'idEmpleado')->dropDownList(ArrayHelper::map($arrayEmpleados, 0, 1)) ?>
       
    <?= $form->field($model, 'Retiro')->dropDownList(["0"=>"No", "1"=>"Si"]) ?>
    
    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div id="divecho"></div>