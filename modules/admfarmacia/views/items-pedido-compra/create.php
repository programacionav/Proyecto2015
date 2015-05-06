<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemsPedidoCompra */

$this->title = 'Crear Nuevo Item Pedido Compra';
$this->params['breadcrumbs'][] = ['label' => 'Items Pedido Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-pedido-compra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
