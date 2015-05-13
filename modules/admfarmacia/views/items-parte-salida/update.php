<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsParteSalida */

$this->title = 'Actualizar Items Parte Salida: ' . ' ' . $model->idItem;
$this->params['breadcrumbs'][] = ['label' => 'Items Parte Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idItem, 'url' => ['view', 'id' => $model->idItem]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="items-parte-salida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
