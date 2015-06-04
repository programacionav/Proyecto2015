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
$this->params['breadcrumbs'][] = "Articulos Disponibles";

?>
<a href='/Proyecto2015/web/index.php/admwiki/'><< VOLVER</a>



<div id="index-contenedor">

<?= Html::a('<i class="fa glyphicon glyphicon-plus"></i> Crear Articulo ', ['create'], ['class' => 'btn btn-success']) ?>
</div>




<div id="index-contenido">
<div id="index-contenido-titulo">
ARTICULOS DISPONIBLES
</div>





    
<div id="index-contenido-recuadroarticulos">

<?= ListView::widget([
'dataProvider' => $dataProvider,
'itemView'=>'_view',
]); ?>


</div>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>


