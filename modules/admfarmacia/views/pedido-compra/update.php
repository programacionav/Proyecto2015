<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoCompra */

$this->title = 'Actualizar Pedido de Compra: ' . ' ' . $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedido de Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedido, 'url' => ['view', 'id' => $model->idPedido]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-compra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
