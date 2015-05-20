<?php
use yii\helpers\Html;
?>

<div class="admcomedor-default-index">
    <h1>Menu ADM Comedor</h1>
    <p> <?= Html::a('Menus', ['menus/index'], ['class' => 'btn btn-success']) ?> </p>
    <p> <?= Html::a('Reservas', ['reservas/index'], ['class' => 'btn btn-success']) ?> </p>
    <p> <?= Html::a('Liquidaciones', ['liquidacion-mensual/index'], ['class' => 'btn btn-success']) ?>  </p>
</div>


