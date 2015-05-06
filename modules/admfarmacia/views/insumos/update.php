<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Insumos */

$this->title = 'Actualizar Insumo: ' . ' ' . $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Insumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Descripcion, 'url' => ['view', 'id' => $model->idInsumo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="insumos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
