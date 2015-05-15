<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Menus;
use app\models\LiquidacionMensual;
use app\models\Empleados;
use app\modules\admcomedor\controllers\ReservasController;
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
        	$load
           
        })
    })*/

</script>

<?php 
//Busco el menu del dia y lo guardo en una variable.
$menu = Menus::findOne(['Fecha'=>date('Y-m-d')]);
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->textInput(['value'=>date('Y-m-d')]) ?>
    
    <?= $form->field($model, 'idMenu')->hiddenInput(['value'=>$menu->idMenu])->hint($menu->Descripcion.' - $'.$menu->Precio) ?>
    
    <?= $form->field($model, 'idEmpleado')->dropDownList(ArrayHelper::map(ReservasController::buscarEmpleados(), 0, 1)) ?>
       
    <?= $form->field($model, 'Retiro')->dropDownList(["0"=>"No", "1"=>"Si"]) ?>
    
    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    	<?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<div id="divecho"></div>