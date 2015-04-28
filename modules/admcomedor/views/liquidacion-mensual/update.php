<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LiquidacionMensual */

$this->title = 'Update Liquidacion Mensual: ' . ' ' . $model->idliquidacion;
$this->params['breadcrumbs'][] = ['label' => 'Liquidacion Mensual', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idliquidacion, 'url' => ['view', 'id' => $model->idliquidacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="liquidacion-mensual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
