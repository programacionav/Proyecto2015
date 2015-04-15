<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteObraSocial */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Paciente Obra Social',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paciente Obra Socials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paciente-obra-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
