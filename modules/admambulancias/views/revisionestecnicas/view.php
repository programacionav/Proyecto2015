<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

echo '<style>
body {background-color:#ddffdd}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Revisionestecnicas */

$this->title = $model->idRevision;
$this->params['breadcrumbs'][] = ['label' => 'Revisiones Tecnicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisionestecnicas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idRevision], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Eliminar', ['delete', 'id' => $model->idRevision], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar esta revision tecnica?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'idRevision','label' => 'Revisión'],
            'Patente',
            'Taller',
            ['attribute' => 'FechaCarga',
                'label' => 'Fecha de Carga',
                'format' => ['date', 'php:d / m / Y']],
            ['attribute' => 'FechaVigencia',
                'label' => 'Fecha de Vigencia',
                'format' => ['date', 'php:d / m / Y']],
            'Observaciones:ntext',
        ],
    ])
    ?>

</div>
