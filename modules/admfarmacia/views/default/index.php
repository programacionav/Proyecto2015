<?php 
use yii\helpers\Html;
?>
<div class="admfarmacia-default-index container-fluid">
   <div class="container-fluid">
   	<h1 class="text-center">| Bienvenido al Administrador de la Farmacia |</h1>
   	<p class="text-center"> Seleccione una opcion </p><br />
   </div>
<div class="col-md-6 col-md-offset-3">
<?= Html::a('INSUMOS', '../web/index.php?r=admfarmacia/insumos', ['class' => 'btn btn-primary btn-block']);?><br /><br />
<?= Html::a('PROVEEDORES', '../web/index.php?r=admfarmacia/proveedor', ['class' => 'btn btn-primary btn-block']);?><br /><br />
<?= Html::a('PEDIDOS DE COMPRA', '../web/index.php?r=admfarmacia/pedido-compra', ['class' => 'btn btn-primary btn-block']);?><br /><br />
<?= Html::a('ITEMS DE PEDIDO DE COMPRA', '../web/index.php?r=admfarmacia/items-pedido-compra', ['class' => 'btn btn-primary btn-block']);?><br /><br />
<?= Html::a('PARTE DE SALIDA', '../web/index.php?r=admfarmacia/parte-salida', ['class' => 'btn btn-primary btn-block']);?><br /><br />
<?= Html::a('ITEMS DE PARTE DE SALIDA', '../web/index.php?r=admfarmacia/items-parte-salida', ['class' => 'btn btn-primary btn-block']);?><br /><br />
</div>


</div>

</div>
