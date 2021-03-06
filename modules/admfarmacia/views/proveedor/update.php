<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */

$this->title = 'Actualizar Proveedor: ' . ' ' . $model->RazonSocial;
$this->params['breadcrumbs'][] = ['label' => 'Proveedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RazonSocial, 'url' => ['view', 'id' => $model->idProveedor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proveedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
