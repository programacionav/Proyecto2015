<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Capacitaciones;
use app\models\app\models;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasCapacitadoras */

$this->title = $model->idEmpresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas Capacitadoras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-capacitadoras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idEmpresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idEmpresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
    		echo DetailView::widget([
     	   'model' => $c,
     	   'attributes' => [
            'Nombre',
            'Descripcion',
     	   	'Fecha',
     	   	'DuracionHoras',
     	   	'idCapacitador',
        ],
    ]);
    	}    	
    ?>
</div>