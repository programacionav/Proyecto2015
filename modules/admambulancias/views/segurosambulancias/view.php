<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Segurosambulancias */

$this->title = $model->idseguro;
$this->params['breadcrumbs'][] = ['label' => 'Seguros de Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segurosambulancias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idseguro], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Eliminar', ['delete', 'id' => $model->idseguro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de que desea eliminar este seguro?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'idseguro', 'label' => 'Seguro'],
            'Patente',
            ['attribute' => 'NroPoliza', 'label' => 'Póliza'],
            'Aseguradora',
            ['attribute' => 'FechaDesde',
                'label' => 'Desde',
                'format' => ['date', 'php:d / m / Y']],
            ['attribute' => 'FechaHasta',
                'label' => 'Hasta',
                'format' => ['date', 'php:d / m / Y']],
            'ValorMensual'
        ],
    ])
    ?>

</div>
