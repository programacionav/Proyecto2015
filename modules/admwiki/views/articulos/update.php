<head>
	<link rel="stylesheet" type="text/css" href="/Proyecto2015/modules/admwiki/views/css/styles.css">
</head>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Modificar Articulo';
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Titulo, 'url' => ['view', 'id' => $model->idArticulo]];
$this->params['breadcrumbs'][] = 'Update';
?>

<!--  Comienzo de Volver -->
<div id="volver">
<a href="javascript:history.back()"><< Volver</a>
</div>
<!--  Fin de Volver -->

<div class="articulos-update">

<div id="update-titulo">
<?= Html::encode($this->title) ?>
</div>

    <?= $this->render('_form_update', [
        'model' => $model,
    	'tagsActuales'	=> $tagsActuales,
    	'datosusuario' => $datosusuario,
    ]) ?>

</div>

