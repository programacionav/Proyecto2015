<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Crear Articulos Nuevos';
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!--  Comienzo de Volver -->
<div id="volver">
<a href="javascript:history.back()"><< Volver</a>
</div>
<!--  Fin de Volver -->

<div class="articulos-create">
<div id="create-titulo">
<?= Html::encode($this->title) ?>
</div>
    <?= $this->render('_form_create', [
        'model' => $model,
    	'datosusuario' => $datosusuario,
    ]) ?>

</div>
