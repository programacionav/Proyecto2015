<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Provincias */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Provincias',
]) . ' ' . $model->idProvincia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Provincias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProvincia, 'url' => ['view', 'id' => $model->idProvincia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="provincias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
