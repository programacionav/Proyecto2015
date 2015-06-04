<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php
use yii\helpers\Html;
/* @var $this ArticulosController */
/* @var $model Articulos */
?>
<?php

echo ('<div class="col-lg-offset-1">');

	echo "<br>";
	echo "<div class='_view-articulo1'>";
	echo "<div class='_view-articulo2'>";
	echo "<div class='_view-articulo3'>";
	echo Html::encode($model->Titulo);
	echo "</div>";
	echo "<div class='_view-articulo4'>";
	echo Yii::$app->formatter->asDate($model['FechaAlta']);
	echo "</div>";
	echo "</div>";
	echo "<div class='_view-articulo5'>";
	echo Yii::$app->formatter->asHtml($model['Texto']);
	echo "</div>";
	echo "<div class='_view-articulo6'>";
	echo Html::a(Html::encode('Ver el Articulo'), ['view', 'id'=>$model->idArticulo]);
	echo "</div>";
	
	echo "<br>";
	

	echo "</div>";

echo ('</div>');


?>



