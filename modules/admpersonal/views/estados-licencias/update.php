<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstadosLicencias */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estados Licencias',
]) . ' ' . $model->idEstado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados Licencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstado, 'url' => ['view', 'id' => $model->idEstado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estados-licencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
