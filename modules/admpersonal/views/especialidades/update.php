<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Especialidades */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Especialidades',
]) . ' ' . $model->idEspecialidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Especialidades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEspecialidad, 'url' => ['view', 'id' => $model->idEspecialidad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="especialidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
