<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\i18n\Formatter;
use yii\base\Configurable;
use app\models\Tagsarticulos;
use app\models\Tags;
use app\models\app\models;


/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = $model->Titulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulos-view">

<!--  Comienzo de Encabezado -->
<div id="view-encabezado">

<!--  Comienzo de Volver -->
<div id="view-volver">
<?php if ($model['idEstado']== 1){ ?>
<a href="/Proyecto2015/web/index.php/admwiki/articulos"><< Volver</a>
<?php } else { ?>
<a href="javascript:history.back()"><< Volver</a>
<?php } ?>
</div>
<!--  Fin de Volver -->

<!--  Comienzo de Fecha -->
<div id="view-fecha">
<?= Yii::$app->formatter->asDate($model['FechaAlta']); ?>
</div>
<!--  Fin de Fecha -->

</div>
<!--  Fin de Encabezado -->  
 

<!--  Comienzo de Cuadro Articulo -->  
<div id="view-cuadroarticulo">

<!--  Comienzo de Cartel de Histórico -->
<?php if ($model['idEstado']== 2)	
	{
	?>
<div style="transform: rotate(45deg); position: relative; top: 285px; left: 690px;">

<div style="position: relative; left: 50px; float: left; transform:  skewX(-45deg); width: 80px; height: 25px ;background-color:#333;border-top: 3px solid red; border-bottom: 3px solid red;z-index: 1; ">
</div>

<div style="float:left; border-style:none; border-width:0; background-color:#333;  width: 80px; height: 25px;border-top: 3px solid red; border-bottom: 3px solid red; position: relative; z-index: 2; text-align: center;font-size: 15px;color: white; font-weight: bolder;">
HISTORICO
</div>

<div style="position: relative; left: -50px;float: left; transform:  skewX(45deg); width: 80px; height: 25px ;background-color:#333; border-top: 3px solid red; border-bottom: 3px solid red;z-index: 1;">
</div>

</div>
<?php } ?>
<!--  Fin de Cartel de Histórico -->

<!--  Comienzo de Título -->
<?php if ($model['idEstado']== 2){
		echo "<div style='text-align: center; font-weight: bolder; font-size: 26px; background-color:#536978; padding: 10px; border-bottom: 10px solid #CCE5FF; color: white;box-shadow: 0px 5px 5px #CCE5FF; text-shadow: 5px 5px 10px #333;'>";
		echo "<span style='position:relative; left: -120px;'>";
		echo $model['Titulo'];
		echo "</span>";
}
	else{
		echo "<div style='text-align: center; font-weight: bolder; font-size: 26px; background-color:#003366; padding: 10px; border-bottom: 10px solid #CCE5FF; color: white;box-shadow: 0px 5px 5px #CCE5FF; text-shadow: 5px 5px 10px #333;'>";
		echo "<span style='position:relative;'>";
		echo $model['Titulo'];
		echo "</span>";
	}
?>
</div>
<!--  Fin de Título -->

<!--  Comienzo de Texto -->
<div id="view-texto">
<?php 

echo Yii::$app->formatter->asHtml($model['Texto']); ?>
</div>  
<!--  Fin de Texto -->

<!--  Comienzo del Autor -->
<div id="view-autor">
<?php 
	$apellido = $model->idEmpleado0->Apellido;
	$nombre = $model->idEmpleado0->Nombre;
	echo Yii::$app->formatter->asHtml($apellido);
	echo ' ';
	echo Yii::$app->formatter->asHtml($nombre);
 ?>
</div>
<!--  Fin de Autor -->  

<!--  Comienzo de Tags -->
<div id="view-tags">
<?php
$OBJ_Tagsarticulos = new Tagsarticulos();  
$ARRAY_Tagsarticulos  = $OBJ_Tagsarticulos->findAll($model->idArticulo);

for($i=0;$i<count($ARRAY_Tagsarticulos);$i++) {
$Par_Tagsarticulos = $ARRAY_Tagsarticulos[$i];
$Tag_Buscado = $Par_Tagsarticulos["idTag"];
$OBJ_Tags = new Tags();
$Tag = $OBJ_Tags->findAll($Tag_Buscado);
$Tag0 = ($Tag[0]);
print_r($Tag0['Descripcion'].' | ');
}
?>
</div>
<!--  Fin de Tags -->

</div>
<!--  Fin de Cuadro Articulo -->

<!--  Comienzo de Botones -->
<div id="view-botonera">
<br>
<p>
        <?php 
        if ($model['idEstado']== 1)
        {
        	echo "<div style='float: left;'>";
        	echo Html::a('Modificar <i class="fa glyphicon glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->idArticulo], ['class' => 'btn btn-primary']);
        	echo " ";
        	echo Html::a('Historicos <i class="fa glyphicon glyphicon glyphicon-hourglass"></i>', ['verhistorico', 'id' => $model->idArticulo], ['class' => 'btn btn-info']);
        	echo " ";
			echo Html::a('PDF <i class="fa glyphicon glyphicon-paperclip"></i>', ['mpdf', 'id' => $model->idArticulo], [
    				'class'=>'btn btn-warning', 
      				'target'=>'_blank', 
//      				'data-toggle'=>'tooltip', 
    				'title'=>'Ver en formato PDF'
			]);
        	echo "</div>";
        };
        ?>
        <?= Html::a('<i class="fa glyphicon glyphicon-remove"></i> Eliminar', ['delete', 'id' => $model->idArticulo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea borrar el articulo? Esto tambien borrara los historicos',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>
</div>
<!--  Fin de Botones -->




