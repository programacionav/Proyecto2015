<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Zelenin\yii\widgets\Summernote\Summernote;
// Agregados para armar la lista desplegable de idEmpleados
use yii\helpers\ArrayHelper;
use app\models\Empleados;
use app\models\Tags;
// Plugins Agregados con Composer
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */
/* @var $form yii\widgets\ActiveForm */

?>
-
<div class="articulos-form">
    
    <!-- Obtener Fecha Actual del Sistema -->
    <?php 
    $fecha = getdate();
    ?>
    
    <?php $form = ActiveForm::begin(); ?>

    <!-- Campos que van ocultos en el formulario -->
	<div style="display: none">    
    <?= $form->field($model, 'Codigo')->label('')->hiddenInput(['maxlength' => 10, 'value' => 'ORIGINAL', 'readonly' => true,]) ?>
<!-- 	Codigo Unico utilizado para ubicar el Articulo en el Sistema.<br><br> -->
	
    			
	<!-- Agregar como value el número 1 = Versión Actual del Artículo -->
    <?= $form->field($model, 'idEstado')->label('')->hiddenInput(['value' => '1']) ?>
<!-- 	1 = Version VIGENTE del Articulo.<br>2 = Version HISTORICA.<br><br> -->
    
    <!-- Incluir Fecha Actual del Sistema como Value-->
    <?= $form->field($model, 'FechaAlta')->textInput(['value' => $fecha['year'].'-'.$fecha['mon'].'-'.$fecha['mday'], 'readonly' => true ]) ?>
	<!-- Fecha actual del sistema.<br><br> -->
    
    <!-- SECCIÓN DE NOMBRE DE USUARIO  -->     	
	<?= $form->field($model, 'idEmpleado')->label('')->textInput(['value' => $datosusuario->idEmpleado]) ?>
	
    
    </div>
    <!-- Fin de campos que van ocultos en el formulario -->
    
    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => 50]) ?>
	Titulo del Articulo.<br><br>
        
    <?= $form->field($model, 'Texto')->widget(Summernote::className(), [
    'clientOptions' => []
		]) ?>
	Contenido del Articulo.<br><br>
    
	
	
	<!-- SECCIÓN DE TAGs  --> 
	<br>
	<strong>Seleecionar TAGs:</strong>
	<br>
	<br>
	<?php /*AGREGANDO TAGS*/
 	$data = ArrayHelper::map(Tags::find()->all(), 'idTag', 'Descripcion');
	
	echo Select2::widget([
			'name' => 'Tags',
			'value' => [], // initial value
			'data' => $data,
			'options' => ['placeholder' => 'Seleccione tags...'],
			'pluginOptions' => [
					'tags' => true,
					'tokenSeparators' => [',', ' '],
					'maximumInputLength' => 10
			],
	]);
	?>
	<!-- FIN SECCIÓN DE TAGs  --> 
		
	<br>

    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Articulo' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

</div>


