<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitaciones */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Capacitaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capacitaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCapacitacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idCapacitacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCapacitacion',
            'Nombre',
            'Descripcion:ntext',
            'Fecha',
            'DuracionHoras',
        	['label' => 'Capacitador', 'value' => $model->idCapacitador0->Nombre.', '.$model->idCapacitador0->Apellido]
            
        ],
    ]) ?>
	<?php
    	echo '<table class="table table-striped table-bordered detail-view"><tbody><tr><th>Nombre</th></tr>';
    	$i = 1;
    	foreach($asistencia as $a)
    	{
    		echo	'<tr>
						<td>'.$a->Nombre.', '.$a->Apellido.'</td>
					</tr>';
    		$i++;
    	}
    	echo '</tbody></table>';
    ?>
</div>
