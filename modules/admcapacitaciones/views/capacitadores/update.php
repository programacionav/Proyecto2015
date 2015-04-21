<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Capacitadores */

$this->title = 'Update Capacitadores: ' . ' ' . $model->idCapacitador;
$this->params['breadcrumbs'][] = ['label' => 'Capacitadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCapacitador, 'url' => ['view', 'id' => $model->idCapacitador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="capacitadores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
