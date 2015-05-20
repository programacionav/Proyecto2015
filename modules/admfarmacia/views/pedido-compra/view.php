<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\UrlManager;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoCompra */
$tit = 'Numero de Pedido: ';
$this->title = $tit.$model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedido Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-compra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['ACTUALIZAR', 'id' => $model->idPedido], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['BORRAR', 'id' => $model->idPedido], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea borrar este pedido?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= 
    
    DetailView::widget([
   		
        'model' => $model,
        'attributes' => [
            'idPedido',
            'Fecha',
            'RazonSocial',           
        ],
    ]) ?>
    
    <?php $elid = $model->idPedido ?>
        	<div class="panel-body">    
     			 <?= Html::a('Agregar Items a este Pedido', "../web/index.php?r=admfarmacia/items-pedido-compra?idPedido=$elid", ['class' => 'btn btn-success']) ?>    
    		</div>

</div>
