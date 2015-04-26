<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tiposlicencias */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tiposlicencias',
]) . ' ' . $model->idTipoLicencia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tiposlicencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoLicencia, 'url' => ['view', 'id' => $model->idTipoLicencia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tiposlicencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
