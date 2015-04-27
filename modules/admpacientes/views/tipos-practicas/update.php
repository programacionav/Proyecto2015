<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TiposPracticas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tipos Practicas',
]) . ' ' . $model->idTipoPractica;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipos Practicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoPractica, 'url' => ['view', 'id' => $model->idTipoPractica]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipos-practicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
