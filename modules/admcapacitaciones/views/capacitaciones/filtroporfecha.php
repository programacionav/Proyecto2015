<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admcapacitaciones\models\CapacitacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capacitaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-index">
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th><a href="/Proyecto2015/web/index.php?r=admcapacitaciones%2Fcapacitaciones%2Findex&amp;sort=idCapacitacion" data-sort="idCapacitacion">Id Capacitacion</a></th><th><a href="/Proyecto2015/web/index.php?r=admcapacitaciones%2Fcapacitaciones%2Findex&amp;sort=Nombre" data-sort="Nombre">Nombre</a></th><th><a href="/Proyecto2015/web/index.php?r=admcapacitaciones%2Fcapacitaciones%2Findex&amp;sort=Descripcion" data-sort="Descripcion">Descripcion</a></th><th><a href="/Proyecto2015/web/index.php?r=admcapacitaciones%2Fcapacitaciones%2Findex&amp;sort=Fecha" data-sort="Fecha">Fecha</a></th><th><a href="/Proyecto2015/web/index.php?r=admcapacitaciones%2Fcapacitaciones%2Findex&amp;sort=DuracionHoras" data-sort="DuracionHoras">Duracion Horas</a></th><th>&nbsp;</th></tr><tr id="w0-filters" class="filters"><td>&nbsp;</td><td><input type="text" class="form-control" name="CapacitacionesSearch[idCapacitacion]"></td><td><input type="text" class="form-control" name="CapacitacionesSearch[Nombre]"></td><td><input type="text" class="form-control" name="CapacitacionesSearch[Descripcion]"></td><td><input type="text" class="form-control" name="CapacitacionesSearch[Fecha]"></td><td><input type="text" class="form-control" name="CapacitacionesSearch[DuracionHoras]"></td><td>&nbsp;</td></tr>
</thead>
<tbody>
<tr data-key="1">
<?php
var_dump($searchModel)
/*foreach ($searchModel as $s)
{
	//echo	'<td>'.$s->idCapacitacion.'</td><td>'.$s->idCapacitacion.'</td><td>'.$s->Nombre.'</td><td>'.$s->Descripcion.'</td><td>'.$s->Fecha.'</td><td>'.$s->DuracionHoras.'</td>';
	var_dump($s);
}*/
?>
</tr>
</tbody></table>
</div>
