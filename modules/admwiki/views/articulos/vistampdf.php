
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

<!--  Comienzo de Encabezado -->
<?php 
echo "<div id='pdf-encabezado' style='width: 700px; height: 20px; font-size: 14px; background-color:; margin: 0 auto; border-bottom: 3px solid #999; color: #333; font-weight: bolder;'>";
echo "<div id='pdf-encabezado-izquierda' style='float: left; border: 0px solid black; width: 300px; padding-top: 30px; height: ;'>";
echo Yii::$app->formatter->asDate($model['FechaAlta']);
echo" </div>";
echo "<div id='pdf-encabezado-derecha' align='right' style='float: right; border: 0px solid black; padding-bottom: 10px;  width: 350px; height: ;'><img width='150px' src='/Proyecto2015/modules/admwiki/views/images/clinicaisologo.png'></div>";
echo "</div>";
?>
<!--  Fin de Encabezado -->
<!--  Comienzo de Texto -->
<?php 
echo '<br><h1 align="center">';
echo Yii::$app->formatter->asHtml($model['Titulo']);
echo '</h1>';
echo '';
	
echo '<hr>';
echo Yii::$app->formatter->asHtml($model['Texto']); ?>
<!--  Fin de Texto -->

<!--  Comienzo del Autor -->
<?php 
$apellido = $model->idEmpleado0->Apellido;
$nombre = $model->idEmpleado0->Nombre;
echo '<br> <br> <div align="right"> <b> <i>';
echo Yii::$app->formatter->asHtml($apellido);
echo ' ';
echo Yii::$app->formatter->asHtml($nombre);
echo '</b> </i></div>'
?>
<!--  Fin de Autor -->  

<?php
echo "<div style='color: #999; width: 700px; border-top: 3px solid #999'>";
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
echo "</div>";	
?>







