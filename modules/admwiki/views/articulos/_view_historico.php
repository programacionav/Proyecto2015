<?php
use yii\helpers\Html;
/* @var $this ArticulosController */
/* @var $model Articulos */
?>
<?php


echo ('<div class="col-lg-offset-1">');


	echo "<br>";
	echo "<div class='_viewhistorico1'>";
	echo "<div class='_viewhistorico2'>";
	echo "<div class='_viewhistorico3'>";
	echo Html::encode($model->Titulo);
	echo "</div>";
	echo "<div class='_viewhistorico4'>";
	echo Yii::$app->formatter->asDate($model['FechaAlta']);
	echo "</div>";
	echo "</div>";
	echo "<div class='_viewhistorico5'>";
	echo Yii::$app->formatter->asHtml($model['Texto']);
	echo "</div>";
	echo "<div class='_viewhistorico6'>";
	echo Html::a(Html::encode('Ver el Articulo'), ['view', 'id'=>$model->idArticulo]);
	echo "</div>";
	
	echo "<br>";
	

	echo "</div>";

echo ('</div>');
?>

