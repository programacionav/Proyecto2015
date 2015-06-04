<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\models\Empleados;

/**
 * @var $this yii\web\View 
 * @var $dataProvider yii\data\ActiveDataProvider 
 * @var $searchModel app\modules\admwiki\models\ArticulosSearch 
 * @var $model Articulos
 
 */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Listado de Historicos";

?>
<a href='/Proyecto2015/web/index.php/admwiki/'><< VOLVER ADM-WIKI</a>


<br><br>
<div id="indexhistorico-encabezado">
<div id="indexhistorico-encabezado-volver">

<a href="javascript:history.back()"><< Volver al Articulo Vigente</a>
</div>
<div id="indexhistorico-encabezado-botonera">
<!-- <?= Html::a('Crear Articulo', ['create'], ['class' => 'btn btn-success']) ?> -->
</div>
</div>





<div id="indexhistorico-contenedor">
<div id="indexhistorico-titulo">
LISTADO DE LOS HISTORICOS DEL ARTICULO SELECCIONADO
</div>



<?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    
<div id="indexhistorico-contenido">

<?= ListView::widget([
'dataProvider' => $dataProvider,
'itemView'=>'_view_historico',
]); ?>

</div>



</div>

