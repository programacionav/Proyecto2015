<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Administrativos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Administrativos',
]) . ' ' . $model->idEmpleado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administrativos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado, 'url' => ['view', 'id' => $model->idEmpleado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="administrativos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
