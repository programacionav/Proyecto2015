<?php

use yii\helpers\Html;

echo '<style>
body {background-color:#ddddff}
</style> ';
/* @var $this yii\web\View */
/* @var $model app\models\Segurosambulancias */

$this->title = 'Actualizar Seguros de Ambulancias: ' . ' ' . $model->idseguro;
$this->params['breadcrumbs'][] = ['label' => 'Seguros de Ambulancias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idseguro, 'url' => ['view', 'id' => $model->idseguro]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="segurosambulancias-update">

    <h1><?= Html::encode($this->title) ?></h1>
 <?php
    $fechaAux= date_create($model->FechaDesde);
    $model->FechaDesde=  date_format($fechaAux,'d-m-Y');
    $fechaAux= date_create($model->FechaHasta);
            $model->FechaHasta=  date_format($fechaAux,'d-m-Y');
    ?>
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
