<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consultas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Consultas',
]) . ' ' . $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Consultas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idConsulta, 'url' => ['view', 'id' => $model->idConsulta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="consultas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
