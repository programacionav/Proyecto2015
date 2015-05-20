<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsPedidoCompra */

$this->title = 'Actualizar Items Pedido Compra: ' . ' ' . $model->idItem;
$this->params['breadcrumbs'][] = ['label' => 'Items Pedido Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idItem, 'url' => ['view', 'id' => $model->idItem]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="items-pedido-compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
