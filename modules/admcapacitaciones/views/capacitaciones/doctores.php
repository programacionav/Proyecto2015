<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Doctores;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admpersonal\models\DoctoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Doctores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th>Matricula</th><th>Nombre</th><th>Apellido</th><th>Esp Descripcion</th><th>Capacitaciones</th></tr>
</thead>
<tbody>
<?php
$i = 1;
foreach($dataProvider as $m)
{
	echo '<tr data-key="1"><td>'.$i.'</td><td>'.$m->Matricula.'</td><td>'.$m->getNombre().'</td><td>'.$m->getApellido().'</td><td>'.$m->getEspDescripcion().'.</td><td><a href="/Proyecto2015/web/index.php/admcapacitaciones/capacitaciones-doctores/capacitaciones?id='.$m->idDoctor.'">Ver...</a></td></tr>';
	$i++;
}
?>
</tbody></table>
</div>
<div>
</div>

<?php
//use yii\helpers\ArrayHelper;
//use yii\helpers\Html;
//use app\models\Empleados;
//$model = new Empleados();
?>

<p><?php //echo Html::activeDropDownList($model, 'idEmpleado', ArrayHelper::map(Empleados::find()->all(), 'idEmpleado', 'Apellido')) ?></p>