<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sectores */

$this->title = $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSector, 'url' => ['view', 'id' => $model->idSector]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sectores-update">

    <h1>Editar Sector: <?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
