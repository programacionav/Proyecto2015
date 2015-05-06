<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	var elspan = document.getElementById("ico");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
    		elspan.className = "glyphicon glyphicon-option-vertical";
			text.innerHTML = "Mostrar Buscador ";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Ocultar Buscador ";
	}
} 
</script>

<?php

/* ACA HAY QUE MODIFICAR PARA QUE MUESTRE EL NOMBRE DEL PROVEEDOR */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admfarmacia\PedidoCompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido de Compras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-compra-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Nuevo Pedido de Compras', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idPedido',
            'Fecha',
            //'idProveedor',
            'RazonSocial',
            ['class'=>'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<div class="container-fluid col-md-6">

	<button type="button" class="btn btn-default" aria-label="Left Align">    
    <span class="glyphicon glyphicon-option-vertical" id="ico" aria-hidden="true"></span>
    <span id="displayText" onclick="javascript:toggle();">Mostrar Buscador</span> 
    </button> 
    
    <div id="toggleText" style="display: none">
    	<div class="panel panel-default">
    		<div class="panel-body">    
     			<?php  echo $this->render('_search', ['model' => $searchModel]); ?>    
    		</div>
    	</div>
    </div>
</div>
