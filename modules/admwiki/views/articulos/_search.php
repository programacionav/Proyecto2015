<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admwiki\models\ArticulosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulos-search" style="width: 800px; overflow: hidden; margin: 0 auto; border: 0px solid black;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!-- <?= $form->field($model, 'idArticulo') ?>

    <?= $form->field($model, 'Codigo') ?>  -->    
    <div style="width: 960px; border: 0px solid yellow; overflow: hidden; float: right; margin-bottom: 0px; margin-top: 0px;">
	<div style="border: 0px solid black; float: right;  width: 400px; padding: 5px 20px;">
	<?= $form->field($model, 'Texto') ?>
	</div>
	<div style="border: 0px solid black; float: right; width: 400px; padding: 5px 20px;">
    <?= $form->field($model, 'Titulo') ?>
	</div>
	
	</div>
	
<!--<?= $form->field($model, 'FechaAlta') ?> -->

    <?php // echo $form->field($model, 'idEstado') ?>

    <?php // echo $form->field($model, 'idEmpleado') ?>

    <div class="form-group" style="overflow:hidden; clear: both; ">
        <div style="float: left; padding: 10px;">
        <!-- <?= Html::a('Crear Articulo', ['create'], ['class' => 'btn btn-success']) ?> -->
        </div>
        <div style="float: right; width: 300px; border: 0px solid black; border-top	: 0; text-align: right; padding: 10px;">
        <?= Html::submitButton('<i class="fa glyphicon glyphicon-search"></i> Buscar ', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa glyphicon glyphicon-tasks"></i> Resetear ', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
