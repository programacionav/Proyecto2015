<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Licencias */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Licencias',
]) . ' ' . $model->idLicencia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLicencia, 'url' => ['view', 'id' => $model->idLicencia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="licencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
