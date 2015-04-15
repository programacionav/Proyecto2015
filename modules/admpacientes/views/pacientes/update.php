<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pacientes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pacientes',
]) . ' ' . $model->idPaciente;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pacientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPaciente, 'url' => ['view', 'id' => $model->idPaciente]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pacientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
