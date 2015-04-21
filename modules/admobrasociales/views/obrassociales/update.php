<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obrassociales */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Obrassociales',
]) . ' ' . $model->idObraSocial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Obrassociales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idObraSocial, 'url' => ['view', 'id' => $model->idObraSocial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="obrassociales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
