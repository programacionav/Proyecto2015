<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Localidades */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Localidades',
]) . ' ' . $model->idLocalidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Localidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLocalidad, 'url' => ['view', 'id' => $model->idLocalidad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="localidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
