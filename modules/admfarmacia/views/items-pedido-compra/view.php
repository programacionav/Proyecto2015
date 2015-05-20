<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsPedidoCompra */

$tit = 'Numero de Item: ';
$this->title = $tit.$model->idItem;
$this->params['breadcrumbs'][] = ['label' => 'Items Pedido Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-pedido-compra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ACTUALIZAR', ['update', 'id' => $model->idItem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->idItem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desea aliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idItem',
            'idPedido',
            'idInsumo',
            'Cantidad',
        ],
    ]) ?>

</div>
