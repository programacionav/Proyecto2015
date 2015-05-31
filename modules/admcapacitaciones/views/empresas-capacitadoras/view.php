<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Capacitaciones;
use app\models\app\models;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasCapacitadoras */

$this->title = $model->RazonSocial.' - '.$model->Cuit;
$this->params['breadcrumbs'][] = ['label' => 'Empresas Capacitadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-capacitadoras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idEmpresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idEmpresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEmpresa',
            'Cuit',
            'RazonSocial',
            'Direccion',
            'Telefono',
        ],
    ]) ?>
    <h3>Capacitacones de esta Empresa</h3>
    <?php
    	foreach($cap as $c)
    	{
    		echo	DetailView::widget([
				        'model' => $c,
				        'attributes' => [
				            'Nombre',
				        	'Descripcion',
				        	'Fecha',
				            'DuracionHoras',
				        	['label' => 'Capacitador', 'value' => $c->idCapacitador0->Nombre.', '.$c->idCapacitador0->Apellido]
				        ],
				    ]);
					//<tr><th>Capacitador</th><td>'.$c->idCapacitador0->Nombre.', '.$c->idCapacitador0->Apellido.'</td></tr>
    	}
    ?>
    <?php
    	/*echo '<table class="table table-striped table-bordered detail-view">';
    	foreach($cap as $c)
    	{
    		echo	DetailView::widget([
	        'model' => $c,
	        'attributes' => [
            'idCapacitacion',
            'Nombre',
            'Descripcion:ntext',
            'Fecha',
            'DuracionHoras',
        	['label' => 'Capacitador', 'value' => $c->idCapacitador0->Nombre.', '.$c->idCapacitador0->Apellido]
            
	        ],
	    ]);
    	}*/?>
</div>